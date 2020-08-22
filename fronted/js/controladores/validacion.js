//variables de validacion
const validacionFormulario = (okBtn, formulario, arregloRegex) => {
  if (document.querySelector(okBtn) === null) return;
  const validarFormulario = () => {
    document.querySelector(okBtn).disabled = true;
    for (let i = 0; i < camposFormulario.length; i++) {
      if (!camposFormulario[i].isVaild) return;
    }
    document.querySelector(okBtn).disabled = false;
  };

  const campoVerificado = (e) => {
    let { value, name } = e.target;
    value = value.trim();
    let validado = false;
    const indiceCampo = camposFormulario.findIndex(
      (objetoCampo) => objetoCampo.name === name
    );
    // validado = setValid(arregloRegex[indiceCampo], value);
    validado = value.match(arregloRegex[indiceCampo]);
    camposFormulario[indiceCampo].isVaild = validado;
    if (validado) {
      e.target.classList.remove("is-invalid");
      if (!e.target.classList.contains("is-valid"))
        e.target.classList.add("is-valid");
    } else {
      e.target.classList.remove("is-valid");
      if (!e.target.classList.contains("is-invalid"))
        e.target.classList.add("is-invalid");
    }
    validarFormulario();
  };

  let camposFormulario = Array.from(document.querySelectorAll(formulario)).map(
    (campo) => {
      campo.addEventListener("keyup", campoVerificado);
      return { campo, isVaild: false, name: campo.name };
    }
  );

  validarFormulario();
};
//mascaras de validacion
const nombreRegex = /[a-zA-zá-úÁ-Ú]+ [a-zA-zá-úÁ-Ú]+( [a-zA-zá-úÁ-Ú]+( [a-zA-zá-úÁ-Ú]+)?)?/g;
const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
const passwordRegex = /.{4,}/g;
const dineroRegex = /\d+(\.\d+)?/g;
const telefonoRegex = /(\+?504[ -]?)?[0-9]{4}[- ]?[0-9]{4}/g;
const identidadRegex = /[0-9]{4}-?[0-9]{4}-?[0-9]{5}/g;
const noCaracteresEspecialesRegex = /[^!"#$%&/\(\)=?¡@¨*\\\[\]{}_\:,;<>]{4,}/g;
const soloLetrasRegex = /[a-zA-Zá-úÁ-Ú]{4,}/g;

const deliveryarregloRegex = [
  nombreRegex,
  emailRegex,
  passwordRegex,
  identidadRegex,
  telefonoRegex,
  noCaracteresEspecialesRegex,
  soloLetrasRegex,
  noCaracteresEspecialesRegex,
  dineroRegex,
];
const createUserarregloRegex = [emailRegex, passwordRegex];
const crearAdminArregloRegex = [
  nombreRegex,
  emailRegex,
  passwordRegex,
  identidadRegex,
  telefonoRegex,
  noCaracteresEspecialesRegex,
  soloLetrasRegex,
  dineroRegex,
];

const crearSocioRegex = [
  noCaracteresEspecialesRegex,
  emailRegex,
  noCaracteresEspecialesRegex,
  telefonoRegex,
];
//validacion de repartidor
validacionFormulario(
  "#createDeliveryBtn",
  "#formularioRepartidor .form-group input",
  deliveryarregloRegex
);
//validacion de clientes
validacionFormulario(
  "#registerButton",
  "#formularioCliente input",
  createUserarregloRegex
);

//validacion de formulario administrador
validacionFormulario(
  "#btnCrearAdmin",
  "#formularioAdmi .form-group input",
  crearAdminArregloRegex
);
//validacion de formulario empresa
validacionFormulario(
  "#cre-btn",
  "#formularioEmpresa .form-group input",
  crearSocioRegex
);
