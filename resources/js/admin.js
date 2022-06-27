require("./bootstrap");


window.boolpress = {
    currentForm: null,
    postid: null,

    openModal(e, id) {
        e.preventDefault();
        this.postid = id;
        this.currentForm = e.currentTarget.parentNode;
        console.log(this.currentForm);
        $("#deleteModal").modal("show");
    },

    previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    },
};
