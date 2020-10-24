const visualizarImagemSelecionada = (coletaniaImagensImg, tituloProduto) => {
    if (coletaniaImagensImg != null && coletaniaImagensImg != undefined) {
        const imagemProdutoId = document.getElementById("imagemProduto")
        const novaImgTag = `<img src="${coletaniaImagensImg}" alt="${tituloProduto}">`
        imagemProdutoId.innerHTML = novaImgTag
    }
    return
}

const calcularParcelas = (precoAtualProduto) => {
    const precoParcelado = document.getElementById("precoParcelado")
    const valorTotal = precoAtualProduto.replace(/\D/g, "") // TRANSFORMA STRING EM NÚMERO

    function formatarValorParcelas(valor) {
        return valor.toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
        })
    }

    for (let vezes = 2; vezes <= 10; vezes++) {
        let valorParcelas = valorTotal / vezes
        // valorParcelas /= 100 // remover uma casa decimal
        if (valorParcelas < 0)
            return
        precoParcelado.innerHTML += `<option value="">${vezes} x ${formatarValorParcelas(valorParcelas)} sem juros</option>`
    }
}


const formatarValor = (valor, elementId) => {
    const element = document.getElementById(elementId)
    return element.innerHTML = valor.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
    })
}

