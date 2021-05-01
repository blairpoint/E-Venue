let els = document.getElementsByClassName("abc")

for (let e of els) {
    e.style.color = "darkgrey"
}

document.getElementById("clickme").addEventListener("click", function() {
    let atask = (document.getElementById('barney').value)
    let tasks = (document.getElementById('tasklist'))

      let li = document.createElement('li');
      li.addEventListener('click', function() {
        li.remove();
      })
   li.appendChild(document.createTextNode(atask));
   tasks.appendChild(li);
// ADDS TO list


 // let rtask = (document.getElementById("li").addEventListener("click", function()) {
   //   li.parentNode.removeChild('li');
   // }
})


let p = document.getElementById('p1')
p.addEventListener("click", function() {
p.style.color = "green";
});

let q = document.getElementById('p2')
q.addEventListener("click", function() {
q.style.color = "blue";
});

let obj = {
  age: 99,
  getOlder: function() {
    this.age = this.age + 1;
  }
  }

  obj.getOlder()

  function add(x,y) {
    return x + y;
  }
console.log(add(5,7));
