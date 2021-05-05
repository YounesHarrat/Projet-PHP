function onClickFilm(nbr, id){
    (async () => {
        const rawResponse = await fetch('http://localhost:8000/index.php?controller=film&action=addLike', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body:JSON.stringify({nbr : nbr, id: id})
        });
      })();
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