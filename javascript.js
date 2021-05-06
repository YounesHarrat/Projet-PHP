let idf;
let idr;
let idc;
let idm;


function onClickFilm(nbr, id=idf){
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

function onClickReview(nbr, id=idr){
  (async () => {
      const rawResponse = await fetch('http://localhost:8000/index.php?controller=review&action=addLike', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body:JSON.stringify({nbr : nbr, id: id})
      }).then(resp=>location.reload());;
    })();
}


function onClickReviewUpdate(id=idm){
  let newReview = document.getElementById("newCom").value;
  //console.log(newReview, id);
  (async () => {
      const rawResponse = await fetch('http://localhost:8000/index.php?controller=film&action=updateReview', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body:JSON.stringify({id: id, newReview: newReview})
      }).then(resp=>location.reload());;
    })();
}

function recuperationFilm(id) {
  idf = id;
  document.querySelector("#modalIdFilm").value = idf;
}

function recuperationReview(id) {
  idr = id;
  // console.log(idr);
  document.querySelector("#modalIdReview").value = idr;
}

function recuperationReviewUpdate(id) {
  idm = id;
  //console.log(idm);
  document.querySelector("#modalIdReviewUpdate").value = idm;
}

