var SweetAlert_custom = {
    init: function () {
        // document.querySelector('.sweet-1').onclick = function() {
        //     swal("Hello world!");
        // }, document.querySelector('.sweet-2').onclick = function() {
        //     swal("Here's the title!", "...and here's the text!");
        // }, document.querySelector('.sweet-3').onclick = function() {
        //     swal("Good job!", "You clicked the button!", "info");
        // }, document.querySelector('.sweet-4').onclick = function() {
        //     swal("Click on either the button or outside the modal.")
        //         .then((value) => {
        //             swal(`The returned value is: ${value}`);
        //         });
        // },
        document.getElementById('cancel').onclick = function () {
            let id = document.getElementById('cancel').getAttribute('data-id');
            swal({
                title: "Apakah anda yakin?",
                text: "Data tidak akan di setujui",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Data berhasil dirubah", {
                            icon: "success"
                        }).then(function () {
                            window.location.href = "newstudent/cancel" + id;
                        });
                    } else {
                        swal("Data tidak dirubah");
                    }
                });
        },

            document.getElementById('cadangan').onclick = function () {
                let id = document.getElementById('cadangan').getAttribute('data-id');
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data tidak akan di buat cadangan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Data berhasil dirubah", {
                                icon: "success"
                            }).then(function () {
                                window.location.href = "newstudent/cadangan" + id;
                            });
                        } else {
                            swal("Data tidak dirubah");
                        }
                    });
            },

            document.getElementById('approve').onclick = function () {
                let id = document.getElementById('approve').getAttribute('data-id');
                swal({
                    title: "Apakah anda yakin?",
                    text: "Data akan di setujui",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Data berhasil dirubah", {
                                icon: "success",
                            }).then(function () {
                                window.location.href = "newstudent/acc" + id;
                            });
                        } else {
                            swal("Data tidak dirubah");
                        }
                    });
            };
        // , document.querySelector('.sweet-6').onclick = function() {
        //     swal("Good job!", "You clicked the button!", "warning");
        // }, document.querySelector('.sweet-7').onclick = function() {
        //     swal("Good job!", "You clicked the button!", "error");
        // }, document.querySelector('.sweet-8').onclick = function() {
        //     swal("Good job!", "You clicked the button!", "success");
        // }, document.querySelector('.sweet-9').onclick = function() {
        //     swal("Good job!", "You clicked the button!", "info");
        // }, document.querySelector('.sweet-10').onclick = function() {
        //     swal("Are you sure you want to do this?", {
        //         buttons: ["Oh noez!", "Aww yiss!"],
        //     });
        // }, document.querySelector('.sweet-11').onclick = function() {
        //     swal("Are you sure you want to do this?", {
        //         buttons: ["Oh noez!", "Aww yiss!"],
        //     });
        // }, document.querySelector('.sweet-12').onclick = function() {
        //     swal("A wild Pikachu appeared! What do you want to do?", {
        //             buttons: {
        //                 cancel: "Run away!",
        //                 catch: {
        //                     text: "Throw Pok??ball!",
        //                     value: "catch",
        //                 },
        //                 defeat: true,
        //             },
        //         })
        //         .then((value) => {
        //             switch (value) {
        //                 case "defeat":
        //                     swal("Pikachu fainted! You gained 500 XP!");
        //                     break;
        //                 case "catch":
        //                     swal("Gotcha!", "Pikachu was caught!", "success");
        //                     break;
        //                 default:
        //                     swal("Got away safely!");
        //             }
        //         });
        // }, document.querySelector('.sweet-13').onclick = function() {
        //     swal("Write something here:", {
        //             content: "input",
        //         })
        //         .then((value) => {
        //             swal(`You typed: ${value}`);
        //         });
        // };
    }
};
(function ($) {
    SweetAlert_custom.init()
})(jQuery);
