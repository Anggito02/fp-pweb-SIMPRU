function setColor(initMonth) {
    // get semua tanggal dipesan (php)
    let dateOrdered = document.getElementsByClassName("tanggalPemakaian");
    dateOrdered = [...dateOrdered];

    // get tanggal dipesan (date element)
    let dateFormatted = [];
    dateOrdered.forEach(element => {
        let date = element.innerHTML.slice(8);
        date = parseInt(date);
        
        dateFormatted.push(date);
    });

    // set color date elements
    dateFormatted.forEach(element => {
        let dateElement = document.getElementById(`${initMonth+1}-${element}`);
        dateElement.classList.add("bg-warning");
    });
}

setColor(currMonth-1);