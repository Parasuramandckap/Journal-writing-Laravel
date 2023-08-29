// const post_id = document.querySelector('.post_id')

const deleteCart = document.querySelectorAll('.delete-post-item')

const starred = document.querySelectorAll('.starred-item')

// homepage more button show function

let moreBtn = document.querySelectorAll(".moreBtn")
let moreBtnDiv = document.querySelectorAll(".action-more-btns")

let viewBtn = document.querySelectorAll(".view-btn")



$('.view-btn ').click(function () {
    $('.view-btn ').removeClass('active')
    $(this).addClass('active');
});



for (let i = 0; i < moreBtnDiv.length; i++) {
    moreBtn[i].addEventListener("click", () => {

        for (let j = 0; j < moreBtnDiv.length; j++) {
            moreBtnDiv[j].classList.add("invisible")
        }

        let targetBtn = moreBtn[i].id
        if (moreBtnDiv[i].id == targetBtn) {
            moreBtnDiv[i].classList.remove("invisible")
        }
    })
}

// share tab function

let shareBtns = document.querySelectorAll(".share-action-openClone-btn")
let shareTab = document.querySelector(".share-tab")

// for(let i=0;i<shareBtns.length;i++){
//     shareBtns[i].addEventListener("click",()=>{
//     })
// }

// emoj js

let emojs = document.querySelectorAll(".emoj")
let emojsText = document.querySelectorAll(".emojText")

for (let s = 0; s < emojs.length; s++) {
    emojs[s].addEventListener("click", () => {
        looping(emojsText, "selected")
        emojsText[s].classList.add("selected")
    })
    emojs[s].addEventListener("mouseover", (e) => {

        looping(emojsText, "active")

        let targetId = e.target.dataset.tarid
        if (targetId == emojsText[s].dataset.tarid) {
            emojsText[s].classList.add("active")
        }
    })
    emojs[s].addEventListener("mouseout", () => {
        looping(emojsText, "active")
    })
}

// more buttons show

window.addEventListener("click", (e) => {
    if (e.target.classList.contains("notTarget") == false) {
        moreBtnDiv.forEach((targetElement) => {
            targetElement.classList.add("invisible")
        })
    }
})

function looping(elements, reClass) {
    for (let i = 0; i < elements.length; i++) {
        elements[i].classList.remove(reClass)
    }
}

// homepage card view tasks

let contents = document.querySelectorAll(".content");
let closeUserContent = document.querySelector(".close-view");
let userViewContent = document.querySelector(".view-content");

// homepage view content

let blackScreen = document.querySelector(".blackScreen")
let btn = document.querySelectorAll(".show-view")
let viewContainer = document.querySelector(".view-user-contents")
let fullContent = document.querySelector('.fullContent');
let title = document.querySelector('.title')

if(closeUserContent){
closeUserContent.addEventListener("click",()=>{
    viewContainer.classList.toggle("de-active")
    blackScreen.classList.toggle("de-active")
})
}

let load = document.querySelector('.load')

$(document).on("click", ".show-view", function () {
    let post_id = $(this).closest(".product").find('.post_id').val();


    // console.log(opt);
    $('.view-user-contents').toggleClass("de-active")
    blackScreen.classList.toggle('de-active')

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'POST',
        url: '/showContent',
        data: {
            'post_id': post_id
        },
        success: function (response) {
            fullContent.innerHTML = response.content
            title.innerText = response.title
            //    console.log(response.content);




        }

    })
    fullContent.innerHTML = "";
    title.innerText = "";
})

// user content view function
// for(let i=0;i<contents.length;i++){
//     contents[i].addEventListener("click",()=>{
//       blackScreen.classList.remove("de-active")
//       userViewContent.classList.remove("de-active")
//     })
// }

// user function clone function
// closeUserContent.addEventListener("click",()=>{
//   userViewContent.classList.add("de-active")
//   blackScreen.classList.add("de-active")
// })



//delete card function
let deleteBtns = document.querySelectorAll(".del-action")


$(document).on("click", ".delete-post-item", function () {
    let post_id = $(this).closest(".product").find('.post_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'POST',
        url: '/deleteContent',
        data: {
            'post_id': post_id
        },
        success: function (response) {

            // $(".carts").load(location.href + " .carts");

            swal("", response.status, "success");


        }
    })
})


if (starred.length > 0) {

    $(document).on("click", ".starred-item", function (e) {

        let post_id = $(this).closest(".product").find('.post_id').val();

        let flag = true;
        if (e.target.classList.contains("star")) {
            flag = true
        }
        else {
            flag = false
        }

        let isStarorNot = flag ? 0 : 1;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/starredItem',
            data: {
                'post_id': post_id,
                'isStarorNot': isStarorNot
            },
            success: function (response) {
                // $(".carts").load(location.href + " .carts");
                swal("", response.status, "success")
            }
        })
    })
}

const restore = document.querySelectorAll('.restore')

const permanentDelete = document.querySelectorAll('.delete-post-item-permanent')

if (restore.length > 0) {

    $(document).on("click", ".restore", function () {

        let post_id = $(this).closest(".product").find('.post_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/restore',
            data: {
                'post_id': post_id
            },
            success: function (response) {
                swal("", response.status, "success")
            }
        })
    })
}
if (permanentDelete.length > 0) {
    $(document).on("click", ".delete-post-item-permanent", function () {

        let post_id = $(this).closest(".product").find('.post_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/deleted',
            data: {
                'post_id': post_id
            },
            success: function (response) {
                swal("", response.status, "success")

            }
        })

    })
}


const restoreAll = document.querySelector('.restoreAll')

$(document).on("click", ".restoreAll", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'POST',
        url: '/restoreAll',
        data: { 'null': null },
        success: function (response) {
            // $(".carts").load(location.href + " .carts");
            swal("", response.status, "success")

        }
    })

})


const deleteAll = document.querySelector('.deleteAll')

$(document).on("click", ".deleteAll", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'POST',
        url: '/deleteAll',
        success: function (response) {
            // $(".carts").load(location.href + " .carts");
            swal("", response.status, "success")
        }
    })

})



var toolbarOptions = [
    ["image", "video", "link"],
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    // ['blockquote', 'code-block'],

    // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
    // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],
    ["image"]
    ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
});
//     var data = @JSON($content);
//    quill.root.innerHTML = data;
//   quill.setContents("<div class='r'>some text</div> ");

//   console.log(quill);


const sendEmail = document.querySelector('.sendEmail')
let emailExists = document.querySelector('.emailExists')
let emailnotExists = document.querySelector('.emailnotExists')

if (sendEmail) {
    sendEmail.addEventListener('keyup', () => {
        let gmail = sendEmail.value
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/gmailGet',
            data: {
                'gmail': gmail
            },
            success: function (response) {
                if (response.status) {
                    emailExists.innerText = response.status
                    emailnotExists.innerText = ""
                }
                else {
                    emailnotExists.innerText = response.Not
                    emailExists.innerText = ""
                }
            }
        })
    })
}


let sendBtn = document.querySelector('.sendBtn')

//  let share = document.querySelector('.share')


$(document).on("click", ".share-action-openClone-btn", function () {

    shareTab.classList.toggle("invisible")

    let post_id = $(this).closest(".product").find('.post_id').val();

    shareFunction(post_id)

})

function shareFunction(post_id) {
    let access;
    $(document).on("click", ".selectAccess", function () {
        access = $('.selectAccess').val();
    })

    $(document).on("click", ".sendBtn", function () {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/shareContent',
            data: {
                'post_id': post_id,
                'email': sendEmail.value,
                'access': access,
            },
            success: function (response) {
                sendEmail.value = "";
                emailExists.innerText = ""
                emailnotExists.innerText = ""

                console.log(response);
                // Swal.fire({
                //       icon: 'error',
                //       title: 'Oops...',
                //       text: response.status,
                //     })

                //   $(".carts").load(location.href + " .carts");
            }
        })

    })
}

const pubBtn = document.querySelector('.pubBtn');
const content_title = document.querySelector('.userTitle');
const content = document.querySelector('.ql-editor > p')

// content.setAttribute('name','content');

//calendar feature done in in flatdateker
optional_config = {
    mode: "range",
    dateFormat: "Y-m-d",
}

let start_date;
let end_date;

$("#date").flatpickr(optional_config);

$("#date").on("input", () => {
    $("#date").val($("#date").val())

    start_date = $("#date").val().slice(0, 10);
    end_date = $("#date").val().slice(14, 26);
})
// console.log(content);
if (pubBtn) {

    pubBtn.addEventListener('click', () => {
        if (start_date || end_date) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/contentStore',
                data: {
                    'content_title': content_title.value,
                    'content': content.innerHTML,
                    "start_date": start_date,
                    "end_date": end_date
                },
                success: function (response) {

                    swal("", response.status, "success")
                    window.location.replace("/");


                }
            })
        }
        else {
            console.log('error');
        }
    })
}

const updateBtn = document.querySelector('.update')
if (updateBtn) {
    updateBtn.addEventListener('click', (e) => {
        const content_title = document.querySelector('.userTitle');
        console.log(content_title.value);
        const content = document.querySelectorAll('.ql-editor > p')
        for (let i = 0; i < content.length; i++) {
            console.log(content[i].innerHTML);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'PUT',
                url: '/update' + '/' + "" + e.target.value,
                data: {
                    'content_title': content_title.value,
                    'content': content[i].innerHTML
                },
                success: function (response) {
                    swal("", response.status, "success")
                    window.location.replace("/");
                }
            })


        }

    })


}

$(document).ready(function () {
    $("#hide").click(function () {
        $(".list").hide();
        $('.grid').show();
    });

    $("#btn2").click(function () {
        $(".grid").hide();
        $('.list').show();
    });
});

let button = document.querySelector("#downloadBtn");
if(button){
button.addEventListener("click",(e)=>{

    let Id = e.target.id;

    let content = $("#"+Id).parent().parent().parent().children().children(".view-containers").html()

    let fileName = $("#"+Id).parent().parent().parent().children().children(".view-containers").children("h3").html();
    // // let a = e.target.parentElement.parentElement.nextSibling;

    // console.log(content);.parent().parent().children(".view-content-header").html();
    var doc = new jsPDF();

    // Add content to PDF
    doc.fromHTML(content, 10, 10, {
        'width': 180
    });
    doc.setFontSize(16);
    doc.setFont('helvetica', 'bold');
    // Save the PDF
    doc.save(fileName+'.pdf');
})
}
let old_password = document.querySelector('.old_password')
let new_password = document.querySelector('.new_password')
let confirm_password = document.querySelector('.confirm_password')

let errorMessage = document.querySelector('.error-message')

$(document).on("click", ".passwordUpdate", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'PUT',
        url: '/password-update',
        data: {
            'old_password': old_password.value,
            'new_password': new_password.value,
            'confirm_password': confirm_password.value
        },
        success: function (response) {
            errorMessage.innerText = response.status
        }
    })

})
