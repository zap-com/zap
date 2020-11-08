const { default: Axios } = require("axios");
const { drop } = require("lodash");

const axios = require("axios");

window.addEventListener("load", () => {
    if (document.querySelector("#drophere")) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')
            .content;

        const secret = document.querySelector('input[name="secret"]').value;

        const drop = new Dropzone("#drophere", {
            url: "/announcement/uploadImages",
            clickable: ".finput",
            params: {
                _token: csrfToken,
                secret
            },

            addRemoveLinks: true,

            init: async () => {
                const res = await axios.get(
                    "/ad/images",
                    {
                        params:{
                            secret
                        }

                    }
                    
                );

                const data = res.data;

                console.log(data);

                data.forEach(el => {
                    let file = {
                        serverId: el.id
                    };
                    console.log(el);
                    drop.options.addedfile.call(drop, file);
                    drop.options.thumbnail.call(drop, file, el.src);
                });
            }
        });

        drop.on("success", (file, res) => {
            file.serverId = res.id;
        });

        drop.on("removedfile", file => {
            axios.delete("/announcement/removeImage", {
                data: {
                    _token: csrfToken,
                    id: file.serverId,
                    secret
                },
                dataType: "json"
            });

            console.log("removed");
        });
    }
});
