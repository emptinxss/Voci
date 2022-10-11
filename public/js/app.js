let media = document.getElementsByClassName("media");

for (var i = 0; i < media.length; i++) {
    media[i].onclick = (e) => {
        e.preventDefault();
    };
}
