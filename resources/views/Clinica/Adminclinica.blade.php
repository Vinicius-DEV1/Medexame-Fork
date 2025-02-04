<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Adm Clínica</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: #003366;
            color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: start;
            padding: 10px;
        }
        .sidebar h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: white;
            font-size: 1rem;
            padding: 10px;
            text-decoration: none;
            width: 100%;
            text-align: left;
        }
        .sidebar .nav-link:hover {
            background-color: #004080;
            border-radius: 5px;
        }
        .header {
            background-color: #003366;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            top: 0;
            z-index: 1000;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .content {
            margin-top: 60px;
            margin-left: 250px;
            padding: 20px;
        }
        .tab-content .form-label {
            font-weight: bold;
        }

        /* Ajustes nas abas */
        .nav-link.active {
            background-color: #004080;
        }

        /* Ajustes para o formulário de Profissionais Associados */
        .form-select {
            width: 100%;
            border-radius: 5px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .photo-input {
            display: block;
            margin-top: 10px;
        }

        /* Estilo para a aba de especialidades */
        .specialty-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1050;
        }
        .specialty-modal.show {
            display: block;
        }
        .specialty-modal .modal-content {
            max-height: 300px;
            overflow-y: auto;
        }
        .specialty-modal .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .specialty-modal .modal-footer button {
            margin-left: 10px;
        }

        /* Estilo para a tabela de procedimentos */
        #procedimentosTable table {
            width: 100%;
            border-collapse: collapse;
        }

        #procedimentosTable th, #procedimentosTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #procedimentosTable th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
  <div class="sidebar">
    <h1>Painel Adm Clínica</h1>
    <div class="nav flex-column" role="tablist">
      <a href="#servicos" class="nav-link" data-bs-toggle="tab" role="tab">Serviços</a>
      <a href="#sobre-clinica" class="nav-link" data-bs-toggle="tab" role="tab">Sobre a Clínica</a>
      <a href="#localizacao" class="nav-link" data-bs-toggle="tab" role="tab">Localização</a>
      <a href="#profissionais-associados" class="nav-link" data-bs-toggle="tab" role="tab">Profissionais Associados</a>
      <a href="#procedimentos" class="nav-link" data-bs-toggle="tab" role="tab">Procedimentos</a>
      <a href="#lista-profissionais" class="nav-link" data-bs-toggle="tab" role="tab">Lista de Profissionais</a>
      <a href="#agendamento" class="nav-link" data-bs-toggle="tab" role="tab">Agendamento</a>
    </div>
  </div>

  <!-- Header -->
  <div class="header">
    <span>Bem-vindo ao Painel</span>
    <div class="user-info">
      <img src="{{ asset('images/icone-usuario.png') }}" alt="Foto da Clínica" width="40">
      <span>Clínica Logada</span>
    </div>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="tab-content">

      <!-- Serviços -->
      <div id="servicos" class="tab-pane fade" role="tabpanel">
        <h3>Serviços</h3>
        <form>
          <div class="mb-3">
            <label for="serviceName" class="form-label">Nome do Serviço</label>
            <input type="text" id="serviceName" class="form-control" placeholder="Digite o nome do serviço" required>
          </div>
          <div class="mb-3">
            <label for="serviceSpecialty" class="form-label">Especialidade</label>
            <input type="text" id="serviceSpecialty" class="form-control" placeholder="Digite a especialidade" required>
          </div>
          <div class="mb-3">
            <label for="servicePrice" class="form-label">Preço</label>
            <input type="number" id="servicePrice" class="form-control" placeholder="Digite o preço" required>
          </div>
          <button type="submit" class="btn btn-primary">Adicionar Serviço</button>
        </form>
      </div>

      <!-- Sobre a Clínica -->
      <div id="sobre-clinica" class="tab-pane fade" role="tabpanel">
        <h3>Sobre a Clínica</h3>
        <form>
          <div class="mb-3">
            <label for="clinicName" class="form-label">Nome da Clínica</label>
            <input type="text" id="clinicName" class="form-control" placeholder="Digite o nome da clínica" required>
          </div>
          <div class="mb-3">
            <label for="clinicDescription" class="form-label">Descrição</label>
            <textarea id="clinicDescription" class="form-control" rows="4" placeholder="Descreva um pouco sobre a clínica" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar Descrição</button>
        </form>
      </div>

      <!-- Localização -->
      <div id="localizacao" class="tab-pane fade" role="tabpanel">
        <h3>Localização</h3>
        <form>
          <div class="mb-3">
            <label for="address" class="form-label">Endereço</label>
            <input type="text" id="address" class="form-control" placeholder="Digite o endereço da clínica" required>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" id="city" class="form-control" placeholder="Digite a cidade" required>
          </div>
          <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <input type="text" id="state" class="form-control" placeholder="Digite o estado" required>
          </div>
          <button type="submit" class="btn btn-primary">Salvar Localização</button>
        </form>
      </div>

      <!-- Profissionais Associados -->
      <div id="profissionais-associados" class="tab-pane fade" role="tabpanel">
        <h3>Profissionais Associados</h3>
        <form id="formProfissional">
          <div class="mb-3">
            <label for="employeeName" class="form-label">Nome do Profissional</label>
            <input type="text" id="employeeName" class="form-control" placeholder="Nome do profissional" required>
          </div>
          <div class="mb-3">
            <label for="employeeRole" class="form-label">Função</label>
            <input type="text" id="employeeRole" class="form-control" placeholder="Função do profissional" required>
          </div>
          <div class="mb-3">
            <label for="employeeEmail" class="form-label">E-mail</label>
            <input type="email" id="employeeEmail" class="form-control" placeholder="E-mail do profissional" required>
          </div>
          <div class="mb-3">
            <label for="employeePhone" class="form-label">Telefone</label>
            <input type="tel" id="employeePhone" class="form-control" placeholder="Telefone do profissional" required>
          </div>
          <div class="mb-3">
            <label for="employeePhoto" class="form-label">Foto</label>
            <input type="file" id="employeePhoto" class="form-control" accept="image/*">
          </div>
          <div class="mb-3">
            <label for="employeeCouncil" class="form-label">Registro do Conselho</label>
            <select id="employeeCouncil" class="form-select" required>
              <option value="">Selecione o Conselho</option>
              <option value="CRM">CRM</option>
              <option value="CRO">CRO</option>
              <option value="CRP">CRP</option>
              <option value="CRN">CRN</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="employeeCouncilNumber" class="form-label">Número do Conselho/UF</label>
            <input type="text" id="employeeCouncilNumber" class="form-control" placeholder="Número do Conselho/UF" required>
          </div>
          <div class="mb-3">
            <label for="employeeReturnConsultation" class="form-label">Consulta de Retorno</label>
            <select id="employeeReturnConsultation" class="form-select" required>
              <option value="">Selecione</option>
              <option value="sim">Sim</option>
              <option value="nao">Não</option>
            </select>
          </div>
          <div class="mb-3" id="returnDaysField" style="display: none;">
            <label for="employeeReturnDays" class="form-label">Dias para Retorno</label>
            <input type="number" id="employeeReturnDays" class="form-control" placeholder="Informe os dias para retorno">
          </div>
          <div class="mb-3">
            <label for="employeeSpecialties" class="form-label">Especialidades</label>
            <button type="button" class="btn btn-secondary" onclick="openSpecialtyModal()">Escolher Especialidades</button>
            <div id="selectedSpecialties" class="mt-2"></div>
          </div>
          <button type="submit" class="btn btn-primary">Adicionar Profissional</button>
        </form>
      </div>

      <!-- Procedimentos -->
      <div id="procedimentos" class="tab-pane fade" role="tabpanel">
        <h3>Procedimentos</h3>
        <form id="procedimentosForm">
          <div class="mb-3">
            <label for="procedimentoFile" class="form-label">Upload de Tabela de Procedimentos (Excel)</label>
            <input type="file" id="procedimentoFile" class="form-control" accept=".xlsx, .xls" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar Tabela</button>
        </form>
        <div id="procedimentosTable" class="mt-4"></div>
      </div>

      <!-- Lista de Profissionais -->
      <div id="lista-profissionais" class="tab-pane fade" role="tabpanel">
        <h3>Lista de Profissionais Associados</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Função</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Conselho</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="profissionaisList"></tbody>
        </table>
      </div>

      <!-- Agendamento -->
      <div id="agendamento" class="tab-pane fade" role="tabpanel">
        <h3>Agendamento</h3>
        <input type="text" id="searchDoctor" class="form-control" placeholder="Pesquisar médico">
        <ul id="doctorList" class="list-group mt-3">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Dr. João Silva
            <!-- Ao clicar, chama a função que abre o modal de agendamento -->
            <button class="btn btn-primary btn-sm" onclick="redirectToSchedule()">Horário</button>
          </li>
        </ul>
      </div>

    </div>
  </div>
   <!-- Modal para Agendamento com Grid de Horários -->
   <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scheduleModalLabel">Agendamento de Horários</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <!-- Container que será preenchido dinamicamente com os horários -->
          <div id="timeSlotsContainer"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick="saveSchedule()">Salvar Horários</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal de Especialidades -->
<div id="specialtyModal" class="specialty-modal">
    <div class="modal-content">
        <h4>Escolha as Especialidades</h4>
        <div id="specialtyList">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Alergia e imunologia" id="specialty1">
                <label class="form-check-label" for="specialty1">Alergia e imunologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Anestesiologia" id="specialty2">
                <label class="form-check-label" for="specialty2">Anestesiologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Angiologia" id="specialty3">
                <label class="form-check-label" for="specialty3">Angiologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cardiologia" id="specialty4">
                <label class="form-check-label" for="specialty4">Cardiologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia cardiovascular" id="specialty5">
                <label class="form-check-label" for="specialty5">Cirurgia cardiovascular</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia da mão" id="specialty6">
                <label class="form-check-label" for="specialty6">Cirurgia da mão</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia de cabeça e pescoço" id="specialty7">
                <label class="form-check-label" for="specialty7">Cirurgia de cabeça e pescoço</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia do aparelho digestivo" id="specialty8">
                <label class="form-check-label" for="specialty8">Cirurgia do aparelho digestivo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia geral" id="specialty9">
                <label class="form-check-label" for="specialty9">Cirurgia geral</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia oncológica" id="specialty10">
                <label class="form-check-label" for="specialty10">Cirurgia oncológica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia pediátrica" id="specialty11">
                <label class="form-check-label" for="specialty11">Cirurgia pediátrica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia plástica" id="specialty12">
                <label class="form-check-label" for="specialty12">Cirurgia plástica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia torácica" id="specialty13">
                <label class="form-check-label" for="specialty13">Cirurgia torácica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Cirurgia vascular" id="specialty14">
                <label class="form-check-label" for="specialty14">Cirurgia vascular</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Clínica médica" id="specialty15">
                <label class="form-check-label" for="specialty15">Clínica médica</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Coloproctologia" id="specialty16">
                <label class="form-check-label" for="specialty16">Coloproctologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dermatologia" id="specialty17">
                <label class="form-check-label" for="specialty17">Dermatologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Endocrinologia e metabologia" id="specialty18">
                <label class="form-check-label" for="specialty18">Endocrinologia e metabologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Endoscopia" id="specialty19">
                <label class="form-check-label" for="specialty19">Endoscopia</label>
            </div>
                        <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dermatologia" id="specialty7">
                <label class="form-check-label" for="specialty7">Dermatologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Endocrinologia" id="specialty8">
                <label class="form-check-label" for="specialty8">Endocrinologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Ginecologia" id="specialty9">
                <label class="form-check-label" for="specialty9">Ginecologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Neurologia" id="specialty10">
                <label class="form-check-label" for="specialty10">Neurologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Oftalmologia" id="specialty11">
                <label class="form-check-label" for="specialty11">Oftalmologia</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Ortopedia" id="specialty12">
                <label class="form-check-label" for="specialty12">Ortopedia</label>
            </div>
        </div>
    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeSpecialtyModal()">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="saveSpecialties()">Salvar</button>
        </div>
    </div>

         <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
  <script>
    // Função para abrir o modal de especialidades
    function openSpecialtyModal() {
      document.getElementById('specialtyModal').classList.add('show');
    }

    // Função para fechar o modal de especialidades
    function closeSpecialtyModal() {
      document.getElementById('specialtyModal').classList.remove('show');
    }

    // Função para salvar as especialidades selecionadas
    function saveSpecialties() {
      const selectedSpecialties = [];
      const checkboxes = document.querySelectorAll('#specialtyList input[type="checkbox"]:checked');
      checkboxes.forEach(checkbox => {
        selectedSpecialties.push(checkbox.value);
      });
      document.getElementById('selectedSpecialties').innerText = selectedSpecialties.join(', ');
      closeSpecialtyModal();
    }

    // Exibir/ocultar campo de dias para retorno
    document.getElementById('employeeReturnConsultation').addEventListener('change', function() {
      const returnDaysField = document.getElementById('returnDaysField');
      if (this.value === 'sim') {
        returnDaysField.style.display = 'block';
      } else {
        returnDaysField.style.display = 'none';
      }
    });

    // Array para armazenar os profissionais com um exemplo já incluído
    const profissionais = [
      {
        nome: "João Silva",
        funcao: "Médico",
        email: "joao@clinica.com",
        telefone: "(31) 99999-9999",
        conselho: "CRM"
      }
    ];

    // Função para listar os profissionais na tabela
    function listarProfissionais() {
      const tbody = document.getElementById('profissionaisList');
      tbody.innerHTML = '';
      profissionais.forEach((p, index) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>
            ${p.nome}
            <button class="btn btn-info btn-sm" onclick="verDetalhes(${index})" style="margin-left: 5px;">Detalhes</button>
          </td>
          <td>${p.funcao}</td>
          <td>${p.email}</td>
          <td>${p.telefone}</td>
          <td>${p.conselho}</td>
          <td>
            <button class="btn btn-danger btn-sm" onclick="excluirProfissional(${index})">Deletar</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Função para exibir os detalhes do profissional
    function verDetalhes(index) {
      const p = profissionais[index];
      alert(
        `Nome: ${p.nome}\n` +
        `Função: ${p.funcao}\n` +
        `E-mail: ${p.email}\n` +
        `Telefone: ${p.telefone}\n` +
        `Conselho: ${p.conselho}`
      );
    }

    // Função para excluir um profissional
    function excluirProfissional(index) {
      if (confirm("Tem certeza que deseja deletar este profissional?")) {
        profissionais.splice(index, 1);
        listarProfissionais();
      }
    }

    // Evento de submissão do formulário de Profissionais Associados
    document.getElementById('formProfissional').addEventListener('submit', function(event) {
      event.preventDefault();
      const novoProfissional = {
        nome: document.getElementById('employeeName').value,
        funcao: document.getElementById('employeeRole').value,
        email: document.getElementById('employeeEmail').value,
        telefone: document.getElementById('employeePhone').value,
        conselho: document.getElementById('employeeCouncil').value,
      };
      profissionais.push(novoProfissional);
      listarProfissionais();
      this.reset();
      document.getElementById('selectedSpecialties').innerText = '';
      document.getElementById('returnDaysField').style.display = 'none';
    });

    // Função para processar o arquivo Excel de procedimentos
    document.getElementById('procedimentosForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const file = document.getElementById('procedimentoFile').files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const data = new Uint8Array(e.target.result);
          const workbook = XLSX.read(data, { type: 'array' });
          const firstSheetName = workbook.SheetNames[0];
          const worksheet = workbook.Sheets[firstSheetName];
          const json = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

          // Exibir os dados na tabela
          const table = document.createElement('table');
          table.className = 'table table-bordered';
          const thead = document.createElement('thead');
          const tbody = document.createElement('tbody');

          // Cabeçalho da tabela
          const headerRow = document.createElement('tr');
          json[0].forEach(header => {
            const th = document.createElement('th');
            th.textContent = header;
            headerRow.appendChild(th);
          });
          thead.appendChild(headerRow);
          table.appendChild(thead);

          // Corpo da tabela
          json.slice(1).forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
              const td = document.createElement('td');
              td.textContent = cell;
              tr.appendChild(td);
            });
            tbody.appendChild(tr);
          });
          table.appendChild(tbody);

          // Exibir a tabela na div
          const procedimentosTable = document.getElementById('procedimentosTable');
          procedimentosTable.innerHTML = '';
          procedimentosTable.appendChild(table);
        };
        reader.readAsArrayBuffer(file);
      }
    });

    /* --- Adições para o Agendamento com Grid de Horários --- */

    // Função para montar dinamicamente o grid de horários
    function populateTimeSlots() {
      const days = [
        { id: "segunda", label: "Segunda-feira" },
        { id: "terca", label: "Terça-feira" },
        { id: "quarta", label: "Quarta-feira" },
        { id: "quinta", label: "Quinta-feira" },
        { id: "sexta", label: "Sexta-feira" }
      ];
      // Horários disponíveis de 07:00 a 00:00
      const times = ["07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "00:00"];
      const container = document.getElementById("timeSlotsContainer");
      container.innerHTML = "";

      days.forEach(day => {
        // Cria um bloco para cada dia
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("mb-3");
        const dayTitle = document.createElement("h6");
        dayTitle.textContent = day.label;
        dayDiv.appendChild(dayTitle);

        // Cria uma linha com os horários
        const rowDiv = document.createElement("div");
        rowDiv.classList.add("row", "g-2");

        times.forEach(time => {
          const colDiv = document.createElement("div");
          colDiv.classList.add("col-auto");

          const formCheck = document.createElement("div");
          formCheck.classList.add("form-check", "form-switch");

          const checkbox = document.createElement("input");
          checkbox.classList.add("form-check-input");
          checkbox.type = "checkbox";
          // Gerar um ID único para o checkbox, removendo os dois pontos do horário
          checkbox.id = day.id + "_" + time.replace(":", "");
          checkbox.dataset.day = day.id;
          checkbox.value = time;

          const label = document.createElement("label");
          label.classList.add("form-check-label");
          label.htmlFor = checkbox.id;
          label.textContent = time;

          formCheck.appendChild(checkbox);
          formCheck.appendChild(label);
          colDiv.appendChild(formCheck);
          rowDiv.appendChild(colDiv);
        });

        dayDiv.appendChild(rowDiv);
        container.appendChild(dayDiv);
      });
    }

    // Atualiza a função redirectToSchedule para abrir o modal e popular os horários
    function redirectToSchedule() {
      populateTimeSlots();
      var scheduleModal = new bootstrap.Modal(document.getElementById('scheduleModal'));
      scheduleModal.show();
    }

    // Função para salvar os horários selecionados no modal
    function saveSchedule() {
      const schedule = {};
      const days = ["segunda", "terca", "quarta", "quinta", "sexta"];
      days.forEach(day => {
        schedule[day] = [];
      });

      const checkboxes = document.querySelectorAll("#timeSlotsContainer input[type='checkbox']");
      checkboxes.forEach(chk => {
        if (chk.checked) {
          const day = chk.dataset.day;
          schedule[day].push(chk.value);
        }
      });

      console.log(schedule);
      alert("Horários salvos: " + JSON.stringify(schedule));

      // Fechar o modal
      var scheduleModalEl = document.getElementById('scheduleModal');
      var modal = bootstrap.Modal.getInstance(scheduleModalEl);
      modal.hide();
    }

    // Atualiza o window.onload para incluir a listagem de profissionais
    window.onload = function() {
      listarProfissionais();
    }
  </script>
</body>
</html>