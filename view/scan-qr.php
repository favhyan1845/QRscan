<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<section class="container qr-section">
  <div class="qr-formulario">
    <div class="row justify-content-center">
      <div class="col-sm-12 shadow p-3">
        <h5 class="text-center qr-title">Escanear codigo QR, por favor ponerlo frente a la camara</h5>
        <div class="row text-center">
          <a id="btn-scan-qr" href="#">
            <img src="/autoplaca/wp-content/plugins/scan-qr/assets/fluent_qr-code-28-regular.png" class="img-fluid text-center" width="120">
      </a>
          <canvas hidden="" id="qr-canvas" class="img-fluid"></canvas>
          </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <h3><span id="esExitoso"></span></h3><br>
      <input type="text" placeholder="Nombre Aseguradora" id="qr-field insurrance"><br>
      <input type="text" placeholder="Placa del Vehículo" id="qr-field licensePlate"><br>
      <input type="text" placeholder="Código VIN" id="qr-field policyNumber"><br>
      <input type="text" placeholder="Fecha Inicio de la Póliza SOAT" id="qr-field startDateValid"><br>
      <input type="text" placeholder="Fecha Finalización de la Póliza SOAT" id="qr-field endDateValid"><br>
      <input type="text" placeholder="Fecha Expedición de la Póliza SOAT" id="qr-field expeditionDate"><br>
      <input type="text" placeholder="Tipo Documento Tomador" id="qr-field typeDocumentHolder"><br>
      <input type="text" placeholder="No. Documento Tomador" id="qr-field documentHolder"><br>
      </div>
  </div>
  </section>