document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('kapcsolatForm');
  if(!form) return;
  form.addEventListener('submit', function(e){
    const nev=form.nev.value.trim(), email=form.email.value.trim(), targy=form.targy.value.trim(), uzenet=form.uzenet.value.trim();
    const hibak=[];
    if(nev.length<3) hibak.push('A név legalább 3 karakter legyen.');
    if(!/^\S+@\S+\.\S+$/.test(email)) hibak.push('Hibás e-mail cím.');
    if(targy.length<3) hibak.push('A tárgy legalább 3 karakter legyen.');
    if(uzenet.length<10) hibak.push('Az üzenet legalább 10 karakter legyen.');
    if(hibak.length){ e.preventDefault(); alert(hibak.join('\n')); }
  });
});