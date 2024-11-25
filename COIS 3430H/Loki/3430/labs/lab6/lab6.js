"use strict";
var _a, _b, _c, _d;
let results = document.getElementById("results");
var Year;
(function (Year) {
    Year[Year["First"] = 1] = "First";
    Year[Year["Second"] = 2] = "Second";
    Year[Year["Third"] = 3] = "Third";
    Year[Year["Fourth"] = 4] = "Fourth";
})(Year || (Year = {}));
; // Enum
function search(term, students) {
    if (typeof term === "number") {
        return students.find(s => s.id === term);
    }
    else {
        return students.find(s => s.name === term);
    }
}
/******************************************/
//            Part B
/******************************************/
(_a = document.getElementById("partb")) === null || _a === void 0 ? void 0 : _a.addEventListener("click", () => {
    let name = "Vishal";
    let id = 720487;
    results.innerHTML = `${name} has student number ${id}`;
});
/******************************************/
//            Part C
/******************************************/
(_b = document.getElementById("partc")) === null || _b === void 0 ? void 0 : _b.addEventListener("click", () => {
    let name = "Vishal";
    let id = 720487;
    let currentYear = Year.Fourth;
    let tuition = "International";
    let grades = [["COIS-3430H", 99], ["COIS-3020H", 100]];
    results.innerHTML = `${name} has student number ${id}. He is in year ${currentYear}, pay ${tuition} tuition, and got ${grades[0][1]} in ${grades[0][0]} and ${grades[1][1]} in ${grades[1][0]}`;
});
/******************************************/
//            Part D
/******************************************/
(_c = document.getElementById("partd")) === null || _c === void 0 ? void 0 : _c.addEventListener("click", () => {
    let student = { id: 1, name: "Vishal", currentYear: Year.Third, Tuition: "International", grades: [["COIS-3430H", 98], ["COIS-3020H", 99]] };
    console.log(student);
});
/******************************************/
//            Part E
/******************************************/
(_d = document.getElementById("parte")) === null || _d === void 0 ? void 0 : _d.addEventListener("click", () => {
    let students = [{ id: 1, name: "Vishal", currentYear: Year.Third, Tuition: "International", grades: [["COIS-3430H", 98], ["COIS-3020H", 99]] },
        { id: 2, name: "John", currentYear: Year.Second, Tuition: "International", grades: [["COIS-3430H", 99], ["COIS-3020H", 100]] }];
    let foundStudent = search(1, students);
    if (foundStudent !== undefined) {
        results.innerHTML = `${foundStudent.name} has student number ${foundStudent.id}`;
    }
    else {
        results.innerHTML = "This student couldn't be found";
    }
    foundStudent = search("Vishal", students);
    if (foundStudent !== undefined) {
        results.innerHTML = `${foundStudent.name} has student number ${foundStudent.id}`;
    }
    else {
        results.innerHTML = "This student couldn't be found";
    }
    // foundStudent = search("John", students);
    // if (foundStudent !== undefined) {
    //     results.innerHTML = `${foundStudent.name} has student number ${foundStudent.id}`;
    // }
    // else {
    //     results.innerHTML = "This student couldn't be found";
    // }
});
