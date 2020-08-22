const limpiarFormulario = (query) => {
  Array.from(documnet.querySelectorAll(query)).forEach(
    (field) => (field.value = "")
  );
};

export default limpiarFormulario;