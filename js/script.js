let produtos = [
  { id: 1, nome: "Amaciante", desc: "Amaciante para roupas", preco: 14.99 },
  { id: 2, nome: "Detergente Ype", desc: "Lava Louças", preco: 3.99 },
  { id: 3, nome: "Arroz", desc: "Arroz 5kg", preco: 12.99 },
];

let proximoId = 4;

function renderizar() {
  const tbody = document.getElementById("tabela-body");
  tbody.innerHTML = "";

  produtos.forEach((p) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
    <td><span class="id-badge">#${p.id}</span></td>
    <td><span class="prod-name">${p.nome}</span></td>
    <td><span class="desc">${p.desc}</span></td>
    <td><span class="price">R$ ${p.preco.toFixed(2).replace(".", ",")}</span></td>
    <td>
        <div class="actions">
        <button class="btn-edit" onclick="editarProduto(${p.id})">
            <i class="ti ti-edit"></i> Editar
        </button>
        <button class="btn-del" onclick="excluirProduto(${p.id})">
            <i class="ti ti-trash"></i> Excluir
        </button>
        </div>
    </td>
    `;
    tbody.appendChild(tr);
  });

  document.getElementById("contador").textContent =
    `${produtos.length} produto${produtos.length !== 1 ? "s" : ""} cadastrado${produtos.length !== 1 ? "s" : ""}`;
}

function abrirModal(id = null) {
  document.getElementById("edit-id").value = "";
  document.getElementById("input-nome").value = "";
  document.getElementById("input-desc").value = "";
  document.getElementById("input-preco").value = "";
  document.getElementById("modal-titulo").textContent = "Novo Produto";

  if (id !== null) {
    const p = produtos.find((x) => x.id === id);
    if (p) {
      document.getElementById("edit-id").value = p.id;
      document.getElementById("input-nome").value = p.nome;
      document.getElementById("input-desc").value = p.desc;
      document.getElementById("input-preco").value = p.preco;
      document.getElementById("modal-titulo").textContent = "Editar Produto";
    }
  }

  document.getElementById("modal").classList.add("active");
}

function fecharModal() {
  document.getElementById("modal").classList.remove("active");
}

function salvarProduto() {
  const nome = document.getElementById("input-nome").value.trim();
  const desc = document.getElementById("input-desc").value.trim();
  const preco = parseFloat(document.getElementById("input-preco").value);
  const editId = document.getElementById("edit-id").value;

  if (!nome || !desc || isNaN(preco) || preco < 0) {
    alert("Preencha todos os campos corretamente.");
    return;
  }

  if (editId) {
    const idx = produtos.findIndex((x) => x.id === parseInt(editId));
    if (idx !== -1) produtos[idx] = { id: parseInt(editId), nome, desc, preco };
  } else {
    produtos.push({ id: proximoId++, nome, desc, preco });
  }

  fecharModal();
  renderizar();
}

function editarProduto(id) {
  abrirModal(id);
}

function excluirProduto(id) {
  if (confirm("Deseja excluir este produto?")) {
    produtos = produtos.filter((p) => p.id !== id);
    renderizar();
  }
}

document.getElementById("modal").addEventListener("click", function (e) {
  if (e.target === this) fecharModal();
});

renderizar();
