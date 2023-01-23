const date = new Date();

date.setDate(1);

console.log(date.setDate(1))

const month = date.getMonth();

const monthDays = document.querySelector(".days");

const monthsDiv = document.querySelector(".months");

const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

const firstDayIndex = date.getDay();

const lastDayindex = new Date(date.getFullYear(), date.getMonth(), 0).getDay();

const nextDays = 7 - lastDayindex-1

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

weekDays = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];

// document.querySelector(".date h1").innerHTML = months[date.getMonth()];

// document.querySelector(".date p").innerHTML = date.toDateString();

let days = "";

let monthDiv = "";

for (let x = firstDayIndex; x > 0; x--) {
  days += `<div class="prev-date">
    ${prevLastDay - x + 1}</div>`;
}

for (let i = 1; i <= lastDay; i++) {
    // document.querySelector(".weekdays div").innerHTML = weekDays;
    console.log(weekDays[date.getDate()])
    days += `<div>${i}</div>`;
    monthDays.innerHTML = days;
  }

for (let j = 1; j <= months.length; j++) {
  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  
}

function createMonth(yearNumber) {
    year = yearNumber;
    const month = document.createElement("div");
}