function ubahTema() {
    const temaSaatIni = document.body.classList.contains('gelap') ? 'gelap' : 'terang';

    if (temaSaatIni === 'gelap') {
        document.body.classList.remove('gelap');
        document.body.classList.add('terang');
        sessionStorage.setItem('tema', 'terang'); 
    } else {
        document.body.classList.remove('terang');
        document.body.classList.add('gelap');
        sessionStorage.setItem('tema', 'gelap'); 
    }
}

window.onload = function() {
    const tombol = document.createElement("button");
    tombol.textContent = "Ubah Tema";
    tombol.onclick = ubahTema; 
    document.body.appendChild(tombol);

    const tema = sessionStorage.getItem('tema');
    if (tema) {
        document.body.classList.add(tema); 
    } else {
        document.body.classList.add('terang');
    }
}
