"use strict";
const url = 'api/productos';
const urlComment = 'api/comentarios';
const urlUser = 'api/usuarios';

document.addEventListener("DOMContentLoaded", verify());

function verify() {
    reloadPage();

    function reloadPage() {
        renderDivComments();
    }

    async function renderDivComments() {
        let id = Number(document.querySelector('#id_producto').value);
        try {
            let response = await fetch(`${urlComment}/${id}`);
            let comentarios = await response.json();
            if (comentarios) {
                let r = await fetch(urlUser);
                let usuarios = await r.json();
                if (usuarios) {
                    renderFrontClient(comentarios, usuarios);
                } else {
                    console.log(error);
                }
            } else {
                console.log(error);
            }
        } catch (error) {
            console.log(error);
        }
    }

    let divComments = document.querySelector("#showComments")

    async function renderFrontClient(comentarios, usuarios) {
        let person = document.querySelector("#user_rol").textContent;
        let nombre = document.querySelector("#nombre").textContent;
        divComments.innerHTML = '';

        for (const comentario of comentarios) {
            for (const user of usuarios) {
                if (user.user_id == comentario.id_user) {
                    let id = comentario.id_comentario
                    writeHTML(user, comentario, person, nombre, id)
                    break;
                }
            }
        }
    }

    function writeHTML(user, comentario, person, nombre, id) {
        if (person == 'admin') {
            divComments.innerHTML += `
            <div class="divComment">
                        <p>Usuario:${user.email}</p>
                        <p>Comentario:${comentario.comentario}</p>
                        <p>Puntuacion:${comentario.puntuacion}</p>
                        <p>Producto:${nombre}</p>
                        <button class='eliminarApi' data-id='${id}'>eliminar</button>
            </div>`
        } else {
            divComments.innerHTML +=
                `<div class="divComment">
                        <p>Usuario:${user.email}</p>
                        <p>Comentario:${comentario.comentario}</p>
                        <p>Puntuacion:${comentario.puntuacion}</p>
                        <p>Producto:${nombre}</p>
                        </div>`
        }
        document.querySelectorAll('.eliminarApi').forEach((button) => {
            button.addEventListener('click', deleteForApi);
        });
    }
    async function deleteForApi() {
        let id = this.dataset.id
        try {
            let res = await fetch(`${urlComment}/${id}`, {
                "method": 'DELETE',
            });

            if (res.status == 200) {
                console.log("comentario eliminado");
                reloadPage();
            }
        } catch (error) {
            console.log(error);
        }
    }

    let start = Number(document.querySelector("#loggin").value);
    if (start == 1) {
        let formComment = document.querySelector('#addComment');
        formComment.addEventListener("submit", function(event) {
            event.preventDefault();
            postComment(formComment);
        })
    }

    async function postComment(formComment) {
        let id = Number(document.querySelector('#id_producto').value);
        let categoria = document.querySelector('#categoria').value;
        let user = parseInt(document.querySelector("#user_id").textContent);
        let text = formComment.querySelector("#input-comment-text").value;
        let score = formComment.querySelector("#input-comment-score").value;

        let obj = {
            "comentario": text,
            "puntuacion": score,
            "id_user": user,
            "id_producto": id,
            "categoria": categoria
        }

        try {
            let res = await fetch(urlComment, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(obj)
            })

            if (res.status == 200) {
                console.log("Comentario posteado :)");
                reloadPage();
            } else {
                console.log("nonono");
            }
        } catch (error) {
            console.log(error);
        }
    }
}