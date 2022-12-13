function getCalendar(initMonth, initYear) {
    // variabel konstan
    const MONTH_LIST = ['Januari', 'Febuari', 'Maret', 'April', ' Mei', 'Juni', 'Juli', ' Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const WEEK_LIST = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    
    // set judul
    $('#table-month').html(MONTH_LIST[initMonth] + " " + initYear);
    
    // ambil reference tabel body
    let tableBody = document.getElementById("table-body");


    // cari total hari dalam sebulan
    const getDays = (month, year) => {
        return new Date(year, month, 0).getDate();
    }

    // cari hari tanggal pertama
    let currDate = new Date(initYear, initMonth, 1).getDay();

    // berikan kotak kosong sampai kotak tanggal pertama
    let row;
    if(currDate != 0) {
        // menghindari double inserted row
        row = tableBody.insertRow();
    }
    for(let i=0; i<currDate; i++) {
        let cell = row.insertCell();
    }

    let totalDays = getDays(initMonth + 1, initYear);
    for(let i=1; i<=totalDays; i++) {
        let currDateIter = new Date(initYear, initMonth, i).getDay();

        if(currDateIter == 0) {
            row = tableBody.insertRow();
        }

        cell = row.insertCell();
        cell.innerHTML = i;
        cell.id = (initMonth+1) + "-" + i;
    }

    // berikan kotak kosong sampai kotak tanggal terakhir
    let lastDay = new Date(initYear, initMonth, totalDays).getDay();
    let lastRow = tableBody.rows[tableBody.rows.length -1];
    while(lastDay < 6) {
        lastRow.insertCell();
        lastDay++;
    }

    return;
}

const NOW = new Date();

const monthNow = NOW.getMonth();
const yearNow = NOW.getFullYear();

getCalendar(currMonth-1, currYear);