console.log("%cWarning!", "color:yellow;font-size: 30px;");
console.log("%cDo not copy paste any code.", "color:red;font-size: 30px;");
console.log(
  "%cXSS attacks enable attackers to inject client-side scripts into web pages viewed by other users. A cross-site scripting vulnerability may be used by attackers to bypass access controls such as the same-origin policy.",
  "color: red"
);
const deleteBtn = document.querySelector("#deleteBtn");
const renameBtn = document.querySelector("#renameBtn");
const deleteSure = document.querySelector("#deleteSure");
const renameSure = document.querySelector("#renameSure");
const download = document.querySelector("#download");
const zip = document.querySelector("#zip");
const selectAll = document.querySelector("#selectAll");
const favBtns = document.querySelectorAll(".card .star");
const dng = document.querySelector(".drag-n-drop");
const dropContainer = document.querySelector(".drag-n-drop .inner-border");

var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});
const loader = `<span class="loader"></span>`;

document.querySelectorAll(".select").forEach((node) => {
  node.addEventListener("change", (e) => {
    let isFiles = false;
    document.querySelectorAll(".select:checked").forEach((el) => {
      if (el.dataset.isDir == "false") {
        isFiles = true;
      } else {
        isFiles = false;
      }
    });
    if (isFiles) {
      download.classList.remove("disabled");
    } else {
      download.classList.add("disabled");
    }
    if (document.querySelectorAll(".select:checked").length > 0) {
      renameBtn.classList.remove("disabled");
      deleteBtn.classList.remove("disabled");
      zip.classList.remove("disabled");
    } else {
      zip.classList.add("disabled");
      download.classList.add("disabled");
      renameBtn.classList.add("disabled");
      deleteBtn.classList.add("disabled");
    }
  });
});

deleteSure.addEventListener("click", () => {
  const form = document.querySelector("#selectedItems");
  const hidden = document.createElement("input");
  hidden.type = "hidden";
  hidden.value = "true";
  hidden.name = "delete";
  form.appendChild(hidden);
  form.submit();
});

zip.addEventListener("click", () => {
  const form = document.querySelector("#selectedItems");
  const hidden = document.createElement("input");
  hidden.type = "hidden";
  hidden.value = "true";
  hidden.name = "download";
  form.appendChild(hidden);
  form.submit();
});

download.addEventListener("click", () => {
  document.querySelectorAll(".select:checked").forEach((node) => {
    const a = document.createElement("a");
    a.href = node.value;
    a.download = node.getAttribute("data-name");
    a.click();
  });
});

renameSure.addEventListener("click", (event) => {
  const form = document.querySelector("#selectedItems");
  form.submit();
});

let isCheckAll = false;
selectAll.addEventListener("click", () => {
  isCheckAll = !isCheckAll;
  document.querySelectorAll(".select").forEach((node) => {
    node.checked = isCheckAll;
  });
  if (isCheckAll) {
    renameBtn.classList.remove("disabled");
    deleteBtn.classList.remove("disabled");
    zip.classList.remove("disabled");
    download.classList.remove("disabled");
  } else {
    renameBtn.classList.add("disabled");
    deleteBtn.classList.add("disabled");
    zip.classList.add("disabled");
    download.classList.add("disabled");
  }
});

favBtns.forEach((el) =>
  el.addEventListener("click", (evt) => handleFav(evt, el))
);

function handleFav(evt, el) {
  const form = document.createElement("form");
  form.method = "POST";
  const pathInput = document.createElement("input");
  pathInput.type = "hidden";
  pathInput.value = el.dataset.path;
  pathInput.name = "path";

  const nameInput = document.createElement("input");
  nameInput.type = "hidden";
  nameInput.value = el.dataset.name;
  nameInput.name = "star";

  form.appendChild(pathInput);
  form.appendChild(nameInput);

  document.body.appendChild(form);
  form.submit();
  document.body.removeChild(form);
}

let timer;

document.addEventListener("dragstart", (e) => {
  timer = new Date();
});

document.addEventListener("dragend", (e) => {
  dng.classList.add("hide");
});

document.addEventListener("dragover", (e) => {
  if (new Date() - timer > 500) {
    e.preventDefault();
    dng.classList.remove("hide");
  }
});

dropContainer.addEventListener("drop", (e) => {
  e.preventDefault();
  dng.classList.add("hide");
  console.log(e.dataTransfer);

  const form = document.createElement("form");

  form.method = "POST";
  form.enctype = "multipart/form-data";
  const fileInput = document.createElement("input");
  fileInput.type = "file";
  fileInput.multiple = true;
  fileInput.files = e.dataTransfer.files;
  fileInput.name = "file[]";
  const nameInput = document.createElement("input");
  nameInput.type = "text";
  nameInput.name = "filename";

  form.appendChild(fileInput);
  form.appendChild(nameInput);

  document.body.appendChild(form);
  form.submit();
  document.body.removeChild(form);
});

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    dng.classList.add("hide");
  }
});
