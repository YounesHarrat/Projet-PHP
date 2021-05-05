let ida;

function onClickFilm(nbr, id=ida){
    (async () => {
        const rawResponse = await fetch('http://localhost:8000/index.php?controller=film&action=addLike', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body:JSON.stringify({nbr : nbr, id: id})          
        }).then(resp=>location.reload());
      })();
}




function recuperation(id) {
    ida = id;
    document.querySelector("#modalIdFilm").value = ida;
    console.log(ida);
}

function onClickReview(nbr, id){
  (async () => {
      const rawResponse = await fetch('http://localhost:8000/index.php?controller=review&action=addLike', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body:JSON.stringify({nbr : nbr, id: id})
      });
    })();
}
