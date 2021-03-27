let id = 1;

function getValue() {
  let firstBlock = document.getElementById("selectedElements"); //редактор шаблона
  let secondBlock = document.getElementsByClassName("propElements")[0]; //форма заполнения документа
  let select = document.getElementById("list"); //выпадающий список

  let elem; // добавление элемента в редактор шаблона
  elem = document.createElement("div");
  elem.className = "element";
  elem.id = "elem" + id;

  let field; // создание поля в форме заполнения документа

  let delBtn = document.createElement("input"); // кнопка удаления элемента из документа
  delBtn.type = "button";
  delBtn.value = " X "
  delBtn.className = "delBtn";
  delBtn.id = id*100;
  delBtn.setAttribute("onclick", "delElem(id)");

  switch(select.value) { // добавление нового элемента в документ
  case 'h1':
    elem.innerHTML = "Заголовок первого уровня";
    field = document.createElement("input");
    field.type = "text";
    break
  case 'h2':
    elem.innerHTML = "Заголовок второго уровня";
    field = document.createElement("input")
    field.type = "text";
    break;
  case 'p':
    elem.innerHTML = "Текст";
    field = document.createElement("textarea");
    field.addEventListener('keyup', function(){
      if(this.scrollTop > 0){
        this.style.height = this.scrollHeight + "px";
      }
});
    break
  case 'img':
    elem.innerHTML = "Изображение";
    field = document.createElement("input");
    field.type = "text";
    break
  default:
    break
}
  
  field.className = "input";
  field.id = id;
  field.name = select.value;

  // добавляем новые элементы
  firstBlock.append(elem);
  secondBlock.append(field); 
  elem.append(delBtn); 

  elem.style.height = field.clientHeight + 'px';
  console.log(field.clientHeight);

  id++;
}


function showResult() { //построение документа 
  let doc = document.getElementsByClassName("documentArea")[0]; //область построения документа
  let elem; //поле формы
  let block; //создание элемента в документе
  for (let i = 1; i<id; i++) {
    elem = document.getElementById(i);
    block = document.createElement(elem.name);
    block.id = "doc_elem" + i;
    doc.append(block);
    if (elem.name == "img") { 
      block.src = elem.value;
    } else if (elem.name == "p") {
      block.innerHTML = elem.value.replace(/\n/g, '<br/>');
    } else {
      block.innerHTML = elem.value;
    }
  }
}

function delElem(e) {
    
    document.getElementById(e/100).remove(); //удаление элемента формы
    document.getElementById("elem" + e/100).remove(); //удаление элемента редактора формы
    if (document.getElementById("doc_elem"+e/100)) { //удаление элемента из документа
      document.getElementById("doc_elem"+e/100).remove();
    }
     
    id--;
}