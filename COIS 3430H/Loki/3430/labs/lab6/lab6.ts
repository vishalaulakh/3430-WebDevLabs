let results = document.getElementById("results") as HTMLElement;

/***************************************************/
// Define Advanced Types and Search function here

/***************************************************/
type Grade = [string, number]; // Tuple
enum Year {First = 1, Second, Third, Fourth}; // Enum
type FeeType = "Domestic" | "International"; // Union of Literals

interface student{
    name: string;
    readonly id: number;
    currentYear: Year;
    Tuition: FeeType;
    grades: Grade[];
    scholarship ?: string;
}

function search(term: number | string, students: student[]): student | undefined{
    if (typeof term === "number"){
        return students.find(s => s.id === term);
    }
    else {
        return students.find(s => s.name === term);
    }
}
/******************************************/
//            Part B
/******************************************/


document.getElementById("partb")?.addEventListener("click", () => {
    let name = "Vishal";
    let id:number = 720487;
    results.innerHTML = `${name} has student number ${id}`;
});

/******************************************/
//            Part C
/******************************************/

document.getElementById("partc")?.addEventListener("click", () => {
   
    let name:string = "Vishal";
    let id:number = 720487;
    let currentYear: Year = Year.Fourth;
    let tuition: FeeType = "International";
    let grades: Grade[] = [["COIS-3430H", 99],["COIS-3020H", 100]];
    results.innerHTML = `${name} has student number ${id}. He is in year ${currentYear}, pay ${tuition} tuition, and got ${grades[0][1]} in ${grades[0][0]} and ${grades[1][1]} in ${grades[1][0]}`;
    
});

/******************************************/
//            Part D
/******************************************/

document.getElementById("partd")?.addEventListener("click", () => {
    let student : student = { id: 1, name: "Vishal", currentYear: Year.Third, Tuition: "International", grades: [["COIS-3430H", 98],["COIS-3020H", 99]] };
    console.log(student);
});

/******************************************/
//            Part E
/******************************-+
 * *+***********/

document.getElementById("parte")?.addEventListener("click", () => {
    
    let students : student[] = [{ id: 1, name: "Vishal", currentYear: Year.Third, Tuition: "International", grades: [["COIS-3430H", 98],["COIS-3020H", 99]] },
                                { id: 2, name: "John", currentYear: Year.Second, Tuition: "International", grades: [["COIS-3430H", 99],["COIS-3020H", 100]] }];
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
