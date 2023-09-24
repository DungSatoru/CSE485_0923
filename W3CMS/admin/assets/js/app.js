let btnElement = document.querySelector(".filter__btn");
let filterBtn = document.querySelector(".filter__title");
let filterElement = document.querySelector(".filter__body");
let btnLanguage = document.querySelector(".footer__nav--item");
let languageElements = document.querySelector(".footer__subnav");

function collapseHandler(firstElement, secondElement = "", className) {
	firstElement.onclick = () => {
		if (!firstElement.classList.contains(className)) {
			firstElement.classList.add(className);
			if (secondElement) secondElement.classList.add(className);
		} else {
			firstElement.classList.remove(className);
			if (secondElement) secondElement.classList.remove(className);
		}
	};
}

collapseHandler(btnElement, filterElement, "collapse");
collapseHandler(btnLanguage, languageElements, "collapse");
collapseHandler(filterBtn, filterElement, "collapse");

// /////////////////////////////////////////////////////////////

function ToggleElementClass(elements, className, secondElement = "", secondClass = "") {
	$(elements).on("click", function (event) {
		event.preventDefault();
		var $this = $(this); // Chuyển đổi thành đối tượng jQuery
		if (!$this.hasClass(className)) {
			$(elements).removeClass(className); // Loại bỏ class từ tất cả các phần tử trong elements
			$this.addClass(className); // Thêm class vào phần tử đang được click
			if (secondElement) {
				$(secondElement).addClass(secondClass); // Thêm class vào secondElement (nếu có)
			}
		} else {
			$this.removeClass(className); // Loại bỏ class từ phần tử đang được click
			if (secondElement) {
				$(secondElement).removeClass(secondClass); // Loại bỏ class từ secondElement (nếu có)
			}
		}
	});
}

function toggleCheckboxes(checkboxSelector, elementSelector) {
	const $checkboxElement = $(checkboxSelector);
	const $elements = $(elementSelector);

	$checkboxElement.on("change", function () {
		const isChecked = $(this).prop("checked");
		$elements.prop("checked", isChecked);
	});
}

$(document).ready(function () {
	// Xử lý ẩn hiện subnav
	const listElements = $(".has-arrow");
	ToggleElementClass(listElements, "active", null, null);

	// Xử lý Show/Hide sidebar
	const dropdownBtns = $(".sidebar__body > li");
	const sidebarElement = $(".sidebar");
	ToggleElementClass(dropdownBtns, 'active', sidebarElement, 'square')

	// Xử lý checkboxs
	const checkboxElement = $(".primary__checkbox");
	toggleCheckboxes(checkboxElement, ".content_checkbox");


	const btnElement = $(".filter__btn");
	const filterBtn = $(".filter__title");
	const filterElement = $(".filter__body");
	const btnLanguage = $(".footer__nav--item");
	const languageElements = $(".footer__subnav");




	const notifyElements = $(".dropdown__item");
	notifyElements.each(function () {
		if ($(this).hasClass("orange")) {
			$(this).css("--color", "#FF6A59");
			$(this).css("--secondary-color", "#fcbbbc");
		} else if ($(this).hasClass("blue")) {
			$(this).css("--color", "#58BAD7");
			$(this).css("--secondary-color", "#d3edf5");
		} else if ($(this).hasClass("yellow")) {
			$(this).css("--color", "#F0A901");
			$(this).css("--secondary-color", "#fff8e7");
		} else if ($(this).hasClass("green")) {
			$(this).css("--color", "#56c760");
			$(this).css("--secondary-color", "#c9edcc");
		} else if ($(this).hasClass("grey")) {
			$(this).css("--color", "#374557");
			$(this).css("--secondary-color", "#eee");
		}
	});
});


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}