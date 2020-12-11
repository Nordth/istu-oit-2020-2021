let wrapper = document.querySelector('.wrapper');
let id = 1;
let guests = [];
let deletedId = [];

class Guest {
	constructor(id, name) {
		this.id = id;
		this.name = name;
	}
}

function drawStol(x, y, localID) {
	const stol = document.createElement('div');

	stol.classList.add('stol');
	stol.style.left = x;
	stol.style.top = y;
	stol.id = localID;
	stol.innerText = localID;

	stol.addEventListener('dblclick', (e) => {
		if (confirm("Are you sure?")) {
			deleteByID(e.target.id);
			deleteBubble(e.target.id);
			drawGuests();
		}
	});

	document.body.appendChild(stol);
}

function deleteBubble(idNum) {
	document.getElementById(idNum).remove();
}

function deleteByID(idNum) {
	idNum--;
	for (let i = 0; i < guests.length; i++) {
		if (guests[i].id == idNum) {
			deletedId.push(idNum);
			guests.splice(i, 1);
			break;
		}
	}
}



function drawGuests() {
	(function sortArrays() {
		deletedId.sort(function (a, b) {
			return a - b;
		});
		guests.sort(function (a, b) {
			if (a.id > b.id) {
				return 1;
			}
			if (a.id < b.id) {
				return -1;
			}
			return 0;
		});
	})();
	const guestsList = document.querySelector('#guests-list');
	guestsList.innerHTML = '';
	const guestsUL = document.createElement('div');



	guests.forEach((g) => {
		const lItem = document.createElement('div');
		const deleteButton = document.createElement('button');
		const textOfLi = document.createElement('span');
		const guestID = document.createElement('span');

		textOfLi.innerText = g.name;
		guestID.innerText = `${g.id + 1}. `;
		deleteButton.innerText = 'X';

		deleteButton.addEventListener('click', (e) => {
			const rowID = e.target.previousElementSibling.previousElementSibling.innerText.replace('. ', '');
			if (confirm("Are you sure?")) {
				const rowID = e.target.previousElementSibling.previousElementSibling.innerText.replace('. ', '');
				deleteByID(rowID);
				deleteBubble(rowID);
				drawGuests();
			}
		});

		lItem.appendChild(guestID);
		lItem.appendChild(textOfLi);
		lItem.appendChild(deleteButton);
		guestsUL.appendChild(lItem);
	});

	guestsList.appendChild(guestsUL);
}

function promptInput() {
	const nameUser = prompt('Введите своё имя?');
	if (nameUser == null) return 0;
	return nameUser;
}

wrapper.addEventListener('click', (e) => {
	const nameUser = promptInput();

	if (deletedId.length === 0) {
		guests.push(new Guest(id - 1, nameUser));
		drawStol(e.clientX, e.clientY, id);
		id++;
	} else {
		guests.push(new Guest(deletedId[0], nameUser));
		drawStol(e.clientX, e.clientY, deletedId[0] + 1);
		deletedId.splice(0, 1);
	}

	drawGuests();

});

(function drawPrintButton() {
	const printButton = document.createElement('button');
	printButton.id = 'print';
	printButton.innerText = 'Print';
	printButton.style.position = 'fixed';
	printButton.style.left = '90%';
	printButton.style.top = '90%';

	printButton.addEventListener('click', (e) => {
		e.target.style.display = 'none';
		window.print();
		e.target.style.display = 'block';
	});

	document.body.appendChild(printButton);
})();