document.addEventListener("DOMContentLoaded", function() {
  // Crea elemento
  const video = document.createElement("video");

  // Nuestro canvas
  const canvasElement = document.getElementById("qr-canvas");
  if (!canvasElement) {
    console.error("No se encontró el elemento canvas con ID 'qr-canvas'");
    return;
  }
  const canvas = canvasElement.getContext("2d");

  // Div donde llegará nuestro canvas
  const btnScanQR = document.getElementById("btn-scan-qr");
  if (!btnScanQR) {
    console.error("No se encontró el elemento div con ID 'btn-scan-qr'");
    return;
  }

  // Lectura desactivada
  let scanning = false;

  // Función para encender la cámara
  const encenderCamara = () => {
    navigator.mediaDevices
      .getUserMedia({ video: { facingMode: "environment" } })
      .then(function(stream) {
        scanning = true;
        btnScanQR.hidden = true;
        canvasElement.hidden = false;
        video.setAttribute("playsinline", true); // Required to tell iOS safari we don't want fullscreen
        video.srcObject = stream;
        video.play();
        tick();
        scan();
      })
      .catch(function(err) {
        console.error("Error al acceder a la cámara: ", err);
      });
  };

  // Funciones para levantar las funciones de encendido de la cámara
  function tick() {
    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

    scanning && requestAnimationFrame(tick);
  }

  function scan() {
    try {
      qrcode.decode();
    } catch (e) {
      setTimeout(scan, 300);
    }
  }

  // Apagar la cámara
  const cerrarCamara = () => {
    video.srcObject.getTracks().forEach((track) => {
      track.stop();
    });
    canvasElement.hidden = true;
    btnScanQR.hidden = false;
  };

  
  const codeQR = (respuesta) => {

const myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/json");
  myHeaders.append("Cookie", "ARRAffinity=7e9d4adb4f59f24f58f11849d80b93b32a2f65a5200f059af07acffe7079ba08; ARRAffinitySameSite=7e9d4adb4f59f24f58f11849d80b93b32a2f65a5200f059af07acffe7079ba08");
  // respuesta = '1324GpNztIQnP40kL5ZA/xBBisTulZEVE+3vJYixPYljJV34aEzyjXmJGp+MeMe9jcaAWU6zkQ5pEAq+/O5JghE1iHGXetNCNeKdPNNbAOR4OZ5DKy1ci+P4k1EqHKHY5s1+ytNKO7pBGruwB8paZW89kuaDNVe5cUzQY6MFQqZgYS+skK04T5AF+lQ3xG5pFG/Li0IOl0X3B+hP7oqajjQ1bJVuqCy2MWH+eCcVrUz/UHzXt11UvvULemjuaFGyuPfpBfFEaIFBdePnY/MLfiMNHNdeMU+laxQzqY7oZaTz4rHw5fn//EB4T70AlxnPemJrYJZxeVfbfSXJ8/Ew1cjamzODNha6T6VJwQI1K/SNKobtj/5e9PswtXSZZ0pz2TFLBnld5ebL94DudIE0ZLLQuYPCfQOe1VZ5BeI2bVqQJrQmjxk/9EqUQIxP8ojWZaSHwR4VQB6vhOImqwi5kgg6xR6ZtYA==';
  // respuesta = '1324GpNztIQnP40kL5ZA/xBBisTulZEVE+3vJYixPYljJV34aEzyjXmJGp+MeMe9jcaAWU6zkQ5pEAq+/O5JghE1iHGXetNCNeKdPNNbAOR4OZ5DKy1ci+P4k1EqHKHY5s1+ytNKO7pBGruwB8paZW89kuaDNVe5cUzQY6MFQqZgYS+skK04T5AF+lQ3xG5pFG/Li0IOl0X3B+hP7oqajjQ1bJVuqCy2MWH+eCcVrUz/UHzXt11UvvULemjuaFGyuPfpBfFEaIFBdePnY/MLfiMNHNdeMU+laxQzqY7oZaTz4rHw5fn//EB4T70AlxnPemJrYJZxeVfbfSXJ8/Ew1cjamzODNha6T6VJwQI1K/SNKobtj/5e9PswtXSZZ0pz2PFLBnld5ebL94DudIE0ZLLQuYPCfQOe1VZ5BeI2bVqQJrQmjxk/9EqUQIxP8ojWZaSHwR4VQB6vhOImqwi5kgg6xR6ZtYA==';
  const raw = JSON.stringify({
    "QR": respuesta
  });

  const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
  };

fetch("https://fasecolda-pre.azurewebsites.net/QR", requestOptions)
  .then((response) => response.text())
  .then((result) => setField((result)))
  .catch((error) => console.error(error));
  };

// Callback cuando termina de leer el código QR
setField = (respuesta) => {
  if (respuesta) {
    var jsonObject = JSON.parse(respuesta);
    if(jsonObject.data.esExitoso == true){
      jQuery("#documentHolder").val(jsonObject.data.documentHolder);
      jQuery("#endDateValid").val(jsonObject.data.endDateValid);
      jQuery("#expeditionDate").val(jsonObject.data.expeditionDate);
      jQuery("#insurrance").val(jsonObject.data.insurrance);
      jQuery("#licensePlate").val(jsonObject.data.licensePlate);
      jQuery("#policyNumber").val(jsonObject.data.policyNumber);
      jQuery("#startDateValid").val(jsonObject.data.startDateValid);
      jQuery("#typeDocumentHolder").val(jsonObject.data.typeDocumentHolder);

    }else{
      console.log(jsonObject.data);
      jQuery("#esExitoso").html('Por favor actualice SOAT');
      
    }
  }
};
  // Callback cuando termina de leer el código QR
  qrcode.callback = (respuesta) => {
    if (respuesta) {
      codeQR(respuesta);
      cerrarCamara();
    }
  };

  // Evento para mostrar la cámara sin el botón
  encenderCamara();  

});

