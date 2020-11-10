(function() {

    var UI = {
        elBoard: document.getElementById('board'),
        elKanban: document.getElementById('kanban'),
      },
      _sectionCounter = 0
      _cardCounter = 0

      board.onselectstart = function(e) {
        e.preventDefault();
    }

    board.ondragstart = function(e) {
        hideMe = e.target;
        e.dataTransfer.setData('card', e.target.id);
        e.dataTransfer.effectAllowed = 'move';
    };

    board.ondragend = function(e) {
        e.target.style.visibility = 'visible';
    };

    var lastEneterd;

    board.ondragenter = function(e) {
        if (hideMe) {
            hideMe.style.visibility = 'hidden';
            hideMe = null;
        }
        lastEntered = e.target;
        var section = closestWithClass(e.target, 'section');
        if (section) {
            section.classList.add('droppable');
            e.preventDefault(); 
            return false;
        }
    };

    board.ondragover = function(e) {
        if (closestWithClass(e.target, 'section')) {
            e.preventDefault();
        }
    };

    board.ondragleave = function(e) {
        if (e.target.nodeType === 1) {
            var section = closestWithClass(e.target, 'section');
            if (section && !section.contains(lastEntered)) {
                section.classList.remove('droppable');
            }
        }
        lastEntered = null; 
    };

    board.ondrop = function(e) {
        var section = closestWithClass(e.target, 'section');
        section= section.childNodes[0];        
        var id = e.dataTransfer.getData('card');    
        if (id) {
            var card = document.getElementById(id);           
            if (card) {
                if (section !== card.parentNode) {
                    section.appendChild(card);
                }
            } else {
                alert('couldn\'t find card #' + id);
            }
        }
        section.parentNode.classList.remove('droppable');
        e.preventDefault();
    };

    function closestWithClass(target, className) {
        while (target) {
            if (target.nodeType === 1 &&
                target.classList.contains(className)) {
                return target;
            }
            target = target.parentNode;
        }
        return null;
    }

    function addSection(name) {
        name = name.trim();
        if(!name || name === '') return false;
        var newListID = ++_sectionCounter;
        var wrapper = document.createElement("div");
        var section = document.createElement("div");
        var addNewCard = document.createElement("div");
        var section_head = document.createElement("div");
        var h1 = document.createElement("h1");
        var button = document.createElement("button");
        var i = document.createElement("i");
        
        wrapper.className = "wrapper";
        wrapper.className = "section";
        wrapper.appendChild(section);
        wrapper.appendChild(addNewCard);

        section.id = 'section_'+newListID;

        section.appendChild(section_head);
        
        section_head.className = "section_head";
        section_head.appendChild(h1);
        section_head.appendChild(button);

        h1.innerHTML = name;

        button.className = "btn";
        button.value =name;
        button.onclick = function(){
            wrapper.remove();
            localStorage.removeItem("section_"+name);
        }
        button.appendChild(i);

        i.className="fa fa-times";
        
        var input = document.createElement("input");
        var btn = document.createElement("button");
        var i2 = document.createElement("i");

        addNewCard.className = "new_card";
        addNewCard.appendChild(input);
        addNewCard.appendChild(btn);

        input.type = "text";
        input.placeholder = "Добавить задачу";
        
        btn.className = "btn";
        btn.onclick = function(){
            addCard(input.value, newListID);
            input.value = "";
        }
        btn.appendChild(i2);

        i2.className="fa fa-plus";
        
        UI.elBoard.append(wrapper);

        localStorage.setItem("section_"+name, newListID);
    }

    function newSectionInput(){
        var new_section = document.createElement("div");
        var input = document.createElement("input");
        var btn = document.createElement("button");
        var i = document.createElement("i");

        new_section.className = "new_section";
        new_section.appendChild(input);
        new_section.appendChild(btn);

        input.type = "text";
        input.placeholder = "Добавить колонку";
        
        btn.className = "btn";
        btn.onclick = function(){
            addSection(input.value);
            input.value = "";
        }
        btn.appendChild(i);

        i.className="fa fa-plus";

        UI.elKanban.append(new_section);
    }
      
    function addCard(text, sectionID) {
        if(!text) return false;
        var section = document.getElementById('section_'+sectionID);
        var newCardID = ++_cardCounter;
        var card = document.createElement("div");          
        var btn = document.createElement("button");
        var i = document.createElement("i");

        card.draggable = true;
        card.className = "card"
        card.id = "card_"+newCardID;
        card.innerHTML = text;
        card.appendChild(btn);
        card.appendChild(i);

        btn.className = "btn";
        btn.onclick = function(){
            card.remove();
            localStorage.removeItem("card_"+text);
        }
        btn.appendChild(i);        

        i.className="fa fa-close";

        section.appendChild(card);

        localStorage.setItem("card_"+text, sectionID);
    }

    function getBoard(){
        Object.keys(localStorage).forEach((key) => {
            if(key.startsWith("section_"))
                addSection(key.substr(8))
        });
        Object.keys(localStorage).forEach((key) => {
            if(key.startsWith("card_"))
                addCard(key.substr(5), localStorage.getItem(key))
        });
    }

    function init () {  
        
        newSectionInput("колонку");
        getBoard();
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        init();
    });
})();