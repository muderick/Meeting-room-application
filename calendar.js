const rightSide = document.querySelector(".right");
const leftMonth = document.querySelector(".left .button");
const yearNum = document.querySelector(".year-num");
const backward = document.querySelector(".backward");
const forward = document.querySelector(".forward");
const body = document.querySelector("body");
const timeline = document.querySelector(".timeline");
const eventDate = document.querySelector(".date");
const eventDay = document.querySelector(".day");

let yearChosen = new Date().getFullYear();
let monthChosen = new Date().getMonth();

let monthIndex = 0;
const Months = [
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

const Day = ["S", "M", "T", "W", "T", "F", "S"];

let events = [
  "Meeting about procurement",
  "ICT hardware replacement",
  "Security enhancement",
];

let departments = [
  "Finance Department",
  "ICT department",
  "Supply Chain",
  "Security department",
  "Legal Section",
];

const date = new Date();
calender();
function calender() {
  rightSide.innerHTML = "";
  for (let i = 0; i < 12; i++) {
    let month = createMonth(i, date.getFullYear());
    rightSide.appendChild(month);
  }
  yearNum.innerHTML = date.getFullYear();
  backward.innerHTML = date.getFullYear() - 1;
  forward.innerHTML = date.getFullYear() + 1;
  // setTimeline();
  clickAdjust();
}
function createMonth(monthNumber, yearNumber) {
  year = yearNumber;
  let i = monthNumber;
  const month = document.createElement("div");
  month.classList.add("months");
  // const monthNum = document.createElement("div");
  // monthNum.classList.add("month-num");
  // monthNum.innerHTML = pad(i + 1);
  // month.appendChild(monthNum);
  const monthName = document.createElement("div");
  monthName.classList.add("month-name");
  monthName.innerHTML = Months[i];
  month.appendChild(monthName);
  const daysDiv = document.createElement("div");
  daysDiv.classList.add("days");
  const barDiv = document.createElement("div");
  barDiv.classList.add("bar");
  for (let j = 0; j < 7; j++) {
    const p = document.createElement("p");
    if (j % 7 == 0) p.classList.add("sunday");
    else if (j % 7 == 6) p.classList.add("saturday");
    p.innerHTML = Day[j];
    barDiv.appendChild(p);
  }
  daysDiv.appendChild(barDiv);
  const line = document.createElement("div");
  line.classList.add("border");
  daysDiv.appendChild(line);
  const datesDiv = document.createElement("div");
  datesDiv.classList.add("dates");

  let firstDayIndex = new Date(year, i, 0).getDay() + 1;
  let lastDate = new Date(year, i + 1, 0).getDate();
  firstDayIndex = firstDayIndex == 7 ? 0 : firstDayIndex;
  let count = 0;
  for (j = 0; j < firstDayIndex; j++) {
    const blankDiv = document.createElement("div");
    datesDiv.appendChild(blankDiv);
    count++;
  }
  for (let j = 1; j <= lastDate; j++) {
    const dayDiv = document.createElement("div");
    dayDiv.classList.add("day");
    if (count % 7 == 0) dayDiv.classList.add("sunday");
    else if (count % 7 == 6) dayDiv.classList.add("saturday");
    dayDiv.innerHTML = j;
    datesDiv.appendChild(dayDiv);
    count++;
  }
  if (count < 37) {
    for (j = 0; j < 36 - count; j++) {
      const blankDiv = document.createElement("div");
      datesDiv.appendChild(blankDiv);
    }
  }
  daysDiv.appendChild(datesDiv);
  month.appendChild(daysDiv);
  return month;
}
function pad(number) {
  let a = number < 10 ? "0" + number : number + "";
  return a;
}

let dateHeader;

function initClick() {
  const allDays = document.querySelectorAll(".day");
  const allMonths = document.querySelectorAll(".month-name");

  // function getRandomItem(arr) {
  //   // get random index value
  //   const randomIndex = Math.floor(Math.random() * arr.length);

  //   // get random item
  //   const item = arr[randomIndex];

  //   return item;
  // }

  // function getNumberOfDays(year, month) {
  //   let numDays = new Date(year, month + 1, 0).getDate();
  //   return numDays;
  // }

  // function renderDays(getNumDays) {
  //   var dateTag;
  //   var dates;
  //   let monthName = Months[monthChosen];
  //   for (let i = 1; i <= getNumDays; i++) {
  //     dayPTag = document.createElement("p");
  //     dayPTag.style.fontSize = "14px";
  //     let dayText = document.createTextNode(i.toString());
  //     dayPTag.appendChild(dayText);
  //     dates = `${monthName} ${i.toString()}, ${yearChosen}`;
  //     console.log(dates)
  //   }
  //   allDays.forEach((day, index) => {
  //     day.addEventListener("click", () => {
  //       const randomEvent = getRandomItem(events);
  //       const eventDiv = document.querySelector(".event");
  //       const eventHeader = document.createElement("h4");
  //       eventHeader.innerText = randomEvent;
  //       dateHeader = document.createElement("h6");
  //       dateHeader.classList.add(("date"));
  //       const deptName = document.createElement("p");
  //       deptName.classList.add("dept");
        
        

  //       dateHeader.append(document.getElementsByClassName(".date").innerText = dates);
        
  //       console.log(dateHeader)
        

  //       eventDate.textContent = `${months[month]} ${year}`;
  //       allMonths.forEach((index) => {
  //         monthIndex = index;
  //         deptName.innerText = getRandomItem(departments);
  //         eventDiv.appendChild(eventHeader);
  //         eventDiv.appendChild(dateHeader);
  //         eventDiv.appendChild(deptName);
  //       });
  //       function daTe() {
  //           return getDateFromCalender(dates);
  //         }
  //         daTe();
  //     });
      

  //   });
  // }

  // function getDateFromCalender(dates) {
  //   dateHeader.append(document.getElementsByClassName(".date").innerText = dates);
  // }

  // renderDays(getNumberOfDays(yearChosen, monthChosen));
}

// function setTimeline() {
//     eventDate.innerHTML = "";
//     let firstDayIndex = new Date(year, i, 0).getDay() + 1;
//     let lastDate = new Date(year, i + 1, 0).getDate();
//     firstDayIndex = firstDayIndex == 7 ? 0 : firstDayIndex;

//     eventDate.appendChild(lastDate);

// const dates = document.getElementsByName("select_date");
// const datesDiv = document.createElement("div");
// datesDiv.classList.add("event");
// datesDiv.appendChild(dates);
// eventDate.appendChild(datesDiv);

// let firstDayIndex = new Date(year, i, 0).getDay() + 1;
// let lastDate = new Date(year, i + 1, 0).getDate();
// firstDayIndex = firstDayIndex == 7 ? 0 : firstDayIndex;
// let count = 0;

// if (last == date.getDate) {
//     datesDiv.appendChild((date.getDate() + "-" + (date.getUTCMonth() + 1) + "-" + date.getFullYear() ))
// }
// }

// function setTimeline() {
//     eventDate.innerHTML = "";
//     const datesDiv = document.createElement("div");
//     datesDiv.classList.add("dates")
//     datesDiv.innerHTML = (date.getDate() + "-" + (date.getUTCMonth() + 1) + "-" + date.getFullYear() );
//     eventDate.appendChild(datesDiv);
//     const fix = document.querySelector(".timeline");
//     let htmlString = fix.innerHTML;
//     timeline.innerHTML = htmlString;
//     timeline.classList.add("animation");
//     setTimeout(() => {
//         leftMonth.classList.remove("animation");
//     }, 300);
// }

// function setTimeline() {
//     date.innerHTML = "";
//     let month = createMonth(monthIndex, date.getFullYear());
//     leftMonth.appendChild(month);
//     const fix = document.querySelector(".timeline");
//     let htmlString = fix.innerHTML;
//     leftMonth.innerHTML = htmlString;
//     leftMonth.classList.add("animation");
//     setTimeout(() => {
//         leftMonth.classList.remove("animation");
//     }, 300);
// }

backward.addEventListener("click", () => {
  date.setFullYear(date.getFullYear() - 1);
  calender();
  clickAdjust();
});
forward.addEventListener("click", () => {
  date.setFullYear(date.getFullYear() + 1);
  calender();
  clickAdjust();
});
window.addEventListener("keydown", (e) => {
  if (e.key == "ArrowRight") {
    forward.click();
  } else if (e.key == "ArrowLeft") {
    backward.click();
  } else if (e.key == "ArrowDown") {
    if (monthIndex < 11) {
      monthIndex += 1;
      setLeftCalender();
    }
  } else if (e.key == "ArrowUp") {
    if (monthIndex > 0) {
      monthIndex -= 1;
      setLeftCalender();
    }
  }
});

function clickAdjust() {
  const width = window.innerWidth;
  if (width >= 1060) {
    initClick();
  }
}

(function () {
  const items = document.querySelectorAll(".timeline li");
  function isElementInViewport(el) {
    let rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function slideIn() {
    for (let i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("slide-in");
      } else {
        items[i].classList.remove("slide-in");
      }
    }
  }

  window.addEventListener("load", slideIn);
  window.addEventListener("scroll", slideIn);
  window.addEventListener("resize", slideIn);
})();
