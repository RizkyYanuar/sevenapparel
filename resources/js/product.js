document.addEventListener("DOMContentLoaded", function () {
    const commentForm = document.getElementById("commentForm");
    commentForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir
        const formData = new FormData(commentForm);
        fetch(commentForm.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Kode untuk menampilkan pesan sukses atau melakukan apa pun yang diperlukan
                    window.location.reload(); // Refresh halaman setelah berhasil
                } else {
                    // Kode untuk menangani kesalahan atau menampilkan pesan gagal
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });

    const productLikeForm = document.getElementById("productLikeForm");
    productLikeForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir
        const formData = new FormData(productLikeForm);
        fetch(productLikeForm.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    console.log("dieksekusi");
                    // Kode untuk menampilkan pesan sukses atau melakukan apa pun yang diperlukan
                    window.location.reload(); // Refresh halaman setelah berhasil
                } else {
                    // Kode untuk menangani kesalahan atau menampilkan pesan gagal
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

const commentLikeButton = document.querySelectorAll(".comment-like-button");

commentLikeButton.forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir
        const formId = button
            .closest(".komen-cuk")
            .querySelector(".commentLikeForm");
        const formData = new FormData(formId);
        fetch(formId.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    console.log("dieksekusi");
                    // Kode untuk menampilkan pesan sukses atau melakukan apa pun yang diperlukan
                    window.location.reload(); // Refresh halaman setelah berhasil
                } else {
                    // Kode untuk menangani kesalahan atau menampilkan pesan gagal
                    console.log("gagal");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

const commentUnlikeButton = document.querySelectorAll(".comment-unlike-button");

commentUnlikeButton.forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir
        const formId = button
            .closest(".komen-cuk")
            .querySelector(".commentUnlikeForm");
        const formData = new FormData(formId);
        fetch(formId.action, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success == true) {
                    console.log("dieksekusi");
                    // Kode untuk menampilkan pesan sukses atau melakukan apa pun yang diperlukan
                    window.location.reload(); // Refresh halaman setelah berhasil
                } else {
                    // Kode untuk menangani kesalahan atau menampilkan pesan gagal
                    console.log("gagal");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});

const replyButton = document.querySelectorAll("#replyButton");

replyButton.forEach((button) => {
    button.addEventListener("click", function () {
        const replyComment = button
            .closest(".replyComment")
            .querySelector("#dropdown");
        replyComment.classList.toggle("hidden");
    });
});
