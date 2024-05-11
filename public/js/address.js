function formatPostalCode(cepInput) {
    var cep = cepInput.value.replace(/\D/g, '');

    if (cep.length === 5) {
      cep = cep.substring(0, 5) + '-' + cep.substring(5);
      cepInput.value = cep;
      
    }

    if (cep.length === 8) {
      searchPostalCode(cep);
    }
}

function searchPostalCode(cep) {
  cep = cep.replace('-', '');
  var script = document.createElement('script');
  script.src = `https://viacep.com.br/ws/${cep}/json/?callback=handleResponse`;
  document.body.appendChild(script);
}

function handleResponse(data) {
  var message = document.querySelector('.messagePostalCode');
  if (!data.erro) {
    fillAddressFields(data);
    message.style.display = 'none';
  } else {    
    message.textContent = 'CEP não encontrado';
    message.style.color = 'red';
    message.style.display = 'block';
  }
}

function fillAddressFields(data) {
  document.getElementById('street').value = data.logradouro;
  document.getElementById('neighborhood').value = data.bairro;
  document.getElementById('city').value = data.localidade;
  document.getElementById('state').value = data.uf;
}

function submitAddress() {
  var formData = new FormData(document.getElementById('addressForm'));
  var postalCode = formData.get('postal_code');
  var street = formData.get('street');
  var neighborhood = formData.get('neighborhood');
  var city = formData.get('city');
  var state = formData.get('state');  
  var submitButton = document.getElementById('btn-submit');
  var address = document.getElementById('address');
  var closeAddress = document.querySelector('#addressModal .close');
  
  if (submitButton.classList.contains('btn-register')) {

    if (postalCode && street && neighborhood && city && state) {
      fetch("/addresses", {
        method: 'POST',
        body: formData
      })
      .then(function(response) {
        if (response.ok) {
          var closeAddress = document.querySelector('#addressModal .close');
          closeAddress.click();
          manageAlert('Page', true, 'Endereço criado com sucesso!', true);
          
          address.textContent = formatAddress(formData);
        } else {
          manageAlert('Modal',true, 'Erro ao enviar dados. Tente novamente!');
        }
        return response.json(); 
      })
      .catch(function(error) {
        manageAlert('Modal',true, 'Erro interno. Tente novamente mais tarde!');
      });
    }else{
      manageAlert('Modal', true, 'Por favor, preencha todos os campos obrigatórios*.');    
    }
  
  } else if (submitButton.classList.contains('btn-edit')) {
    if (postalCode && street && neighborhood && city && state) {
    
      fetch("/addresses", {
        method: 'POST',
        body: formData
      })
      .then(function(response) {
        if (response.ok) {
          address.textContent = formatAddress(formData);
          
          closeAddress.click();
          manageAlert('Page', true, 'Endereço atualizado com sucesso!', true);
        } else {
          manageAlert('Modal', true, 'Erro ao enviar dados. Tente novamente!');
        }
        return response.json(); 
      })
      .catch(function(error) {
        manageAlert('Modal', true, 'Erro interno. Tente novamente mais tarde!');
      });

      // fetch("/addresses/", {
      //   method: 'PUT',
      //   body: formData
      // })
      // .then(function(response) {
      //   if (response.ok) {
      //     var closeAddress = document.querySelector('#addressModal .close');
      //     closeAddress.click();
      //     manageAlert('Page', true, 'Endereço atualizado com sucesso!', true);
      //   } else {
      //     manageAlert('Modal', true, 'Erro ao enviar dados. Tente novamente!');
      //   }
      //   return response.json(); 
      // })
      // .catch(function(error) {
      //   manageAlert('Modal', true, 'Erro interno. Tente novamente mais tarde!');
      // });

    }else{
      manageAlert('Modal', true, 'Por favor, preencha todos os campos obrigatórios*.');    
    }
  }
}


function manageAlert(alertId = null, show = false, message = null, type = false) {
  var alertElement = document.getElementById('alert' + alertId);
  
  if (show) {
    alertElement.style.display = 'block';
  } else {
    alertElement.style.display = 'none';
    return; 
  }
  
  if (message) {
    var iconClass = type ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
    alertElement.innerHTML = '<i class="' + iconClass + '"></i> ' + message;
    alertElement.classList.add('alert-'+ (type ? 'success' : 'danger') );
  }
}

function formatAddress(form) {
  var fullAddress = form.get('street') + ', ' + form.get('neighborhood') + ', ' + form.get('city') + ' - ' + form.get('state') + ', ' + form.get('postal_code');
  return fullAddress;
}


function openEditModal() {
  var editModal = document.getElementById('addressModal');
  var modal = new bootstrap.Modal(editModal);
  var closeAddress = document.querySelector('#addressModal .close');
  var submitButton = document.getElementById('btn-submit');

  submitButton.classList.remove('btn-register');
  submitButton.classList.add('btn-edit');

  fetch("/user/address", {
      method: 'get',
  })
  .then(function(response) {
      if (response.ok) {
          return response.json();
      } else {
          throw new Error('Erro ao carregar dados. Tente novamente!');
      }
  })
  .then(function(data) {
      document.getElementById('street').value = data.street;
      document.getElementById('number').value = data.number;
      document.getElementById('neighborhood').value = data.neighborhood;
      document.getElementById('city').value = data.city;
      document.getElementById('state').value = data.state;
      document.getElementById('postal_code').value = data.postal_code;
      submitButton.innerHTML = '<i class="fas fa-edit"></i> Editar';
      modal.show();
  })
  .catch(function(error) {
      manageAlert('Page', true, error.message);
      closeAddress.click();
  });


}