var blog = [
    {
        "title":"Nuclear Cat",
        "date":"Feb 19, 2015",
        "author":"Ryan Dinesman",
        "image":"/img/nuclear_cat.jpg",
        "tags":[
            "firstPosts", "cats", "explosions"
        ],
        "category":[
            "Normal Post", "Meow"
        ],
        "post":"By Bastet's whiskers! Have you seen this cat? His eyeballs are mushrooms!"
    } 
]

function post(){
    var newMain = "";
    for(var it = 0; it < blog.length; it++){
        var categories = "";

        for (var i = 0; i < blog[it].category.length; i++){
            categories+=blog[it].category[i];
            if (i != (blog[it].category.length - 1)){
                categories += ", ";
            }
        };
        newMain = 
        "<div class = 'post'>" +
            "<img src=" + blog[it].image + " class = 'thumbnail'>" +
            "<h1 class = 'post-header'>" + 
                blog[it].title + 
            "</h1>" +
            "<h3 class = 'post-data author'>" + 
                blog[it].author + 
            "</h3>"+
            "<h3 class = 'post-data date'>"+
                blog[it].date+
            "</h3>"+
            "<h3 class = 'post-data categories'>"+
                "Categories: " + categories + 
            "</h3>"+
            "<p class = 'content'>" + 
                blog[it].post + 
        "</div>" +
        newMain;
    };
    document.getElementById("main").innerHTML = newMain;
};

post();

postListen = function(event){
    console.log("Push");
    var inputCat = document.getElementById("newPostCats").value;
     console.log(inputCat);
    var inputCatArray = inputCat.split(",");
 
    // console.log(inputCatArray); 
    blog.push({
        "title": document.getElementById("newPostTitle").value,
        "date":document.getElementById("newPostDate").value,
        "author":document.getElementById("newPostAuthor").value,
        "image":document.getElementById("newPostImg").value,
        "tags": ["Tag", "You're", "It"],
        "category":inputCatArray,
        "post": document.getElementById("newPostCont").value
    });
    console.log(blog);
    post();
};
document.getElementById("newPostSubmit").addEventListener("click", postListen, false);

// Code to do this through .appendChild();
    // function post(idParam, titleParam, dateParam, authorParam, imgParam, tagsParam, categoriesParam, previewParam){
    //     id = idParam;
    //     div = document.createElement("div");
    //     div.className = "post";
    //     div.id = id;
    //     document.getElementById("main").appendChild(div);

    //     img = document.createElement("img");
    //     img.className = "thumbnail";
    //     img.setAttribute('src', imgParam);
    //     document.getElementById(id).appendChild(img);

    //     title = document.createElement("h1"),
    //     title.className = "post-header",
    //     title.innerHTML = titleParam;
    //     document.getElementById(id).appendChild(title);

    //     datAuth = document.createElement("div");
    //     datAuth.className = "datAuth";
    //     datAuthID = "datAuth_" + idParam;
    //     datAuth.className = "content";
    //     datAuth.style.height = "50px";
    //     datAuth.style.width = "400px";
    //     datAuth.style.border = "solid black 1px";
    //     document.getElementById(id).appendChild(datAuth);


    //     date = document.createElement("p");
    //     date.className = "post-data date";
    //     date.innerHTML = dateParam;
    //     document.getElementById(datAuth).appendChild(date);

    //     author = document.createElement("p");
    //     author.className = "post-data author";
    //     author.innerHTML = authorParam;
    //     document.getElementById(datAuth).appendChild(author);

    //     tags = document.createElement("p");
    //     tags.className = "post-data";
    //     tags.innerHTML = tagsParam;
    //     document.getElementById(id).appendChild(tags);

    //     categories = document.createElement("p");
    //     categories.className = "post-data";
    //     categories.innerHTML = categoriesParam;
    //     document.getElementById(id).appendChild(categories);

    //     preview = document.createElement("p");
    //     preview.className = "preview";
    //     preview.innerHTML = previewParam;
    //     document.getElementById(id).appendChild(preview);
    // };

    // function newPost(){
    //     var id = prompt("What is the id?");
    //     var title = prompt("What is the post's title?");
    //     var date = prompt("What is the date?");
    //     var author = prompt("Who is the author?");
    //     var img = prompt("What's the image source?");
    //     var tags = prompt("What are the tags?");
    //     var categories = prompt("What are the categories?");
    //     var preview = prompt("What is the preview?");

    //     post(id, title, date, author, img, tags, categories, preview);
    // };

    // // blog[0] = post("Wombo Combo", "Da Date", "Ryan Dinesman", "/img/nuclear_cat.jpg", "tags", "categories", "Preview here!");
    // post("post1", "Title", "Date", "Ryan", "/img/nuclear_cat.jpg", "Tags", "Categories", "Preview");