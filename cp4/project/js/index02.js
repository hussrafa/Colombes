Array.from(document.getElementsByClassName("myDiv")).forEach(ec =>
    ec.addEventListener("click", e => {
        alert(e.currentTarget.textContent);
    })
);