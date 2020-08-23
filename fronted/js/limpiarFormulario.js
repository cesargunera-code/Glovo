const limpiarFormulario = (query) => {
  Array.from(document.querySelectorAll(query)).forEach(
    (field) => (field.value = "")
  );
};

export default limpiarFormulario;