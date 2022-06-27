require("./bootstrap");

const app = new Vue({
    el: "#app",
    data: {
        currentForm: null,
        postid: null,
    },
    methods: {
        openModal(e, id) {
            e.preventDefault();
            this.postid = id;
            this.currentForm= e.currentTarget.parentNode;
            console.log(this.currentForm);
            $('#deleteModal').modal('show');
        },
        submitForm(){
            this.currentForm.submit();
        }
    },
});
