

function btnSearch() {
  const dataForm = new FormData(document.getElementById('formulario'));
  fetch('back-end/consulta.php',{
    method: 'POST',
    body: dataForm
  })
  .then(e => e.text())
  .then(drawResponse)
  .catch(console.error);
}

function btnSearchAll() {
  fetch('back-end/consulta.php')
  .then(e => e.text())
  .then(drawResponse)
  .catch(console.error);
}

let drawResponse = response => {
    const content = document.getElementById('content-result');
    content.innerHTML = response;
}
