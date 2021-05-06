'use strict'

{
  const open = document.getElementById('open');
  const overlay = document.querySelector('.overlay');
  const close = document.getElementById('close');

  open.addEventListener('click', () => {
    overlay.classList.add('show');
    open.classList.add('hide');
  });

  close.addEventListener('click', () => {
    overlay.classList.remove('show');
    open.classList.remove('hide');
  });
}

{
  {
    // ＝＝＝＝＝＝＝＝＝IntersectionObserverの処理＝＝＝＝＝＝＝＝＝
      const targets = document.querySelectorAll('img');
      const texts = document.querySelectorAll('span');
    
      function callback(entries, obs) {
          console.log(entries);
    
          entries.forEach(entry => {
              if (!entry.isIntersecting) {
              return;
          }
    
          entry.target.classList.add('appear');
          obs.unobserve(entry.target);
        });
      }
    
        
      const options = {
          threshold: 0.1, 
          rootMargin: '0px 0px -100px',
      }
    
    //intersectionObserverのインスタンス
      const observer = new IntersectionObserver(callback, options);
    
      targets.forEach(target => {
          observer.observe(target);
      });
    
      texts.forEach(target => {
        observer.observe(target);
      });
    }
    // ＝＝＝＝IntersectionObserverの処理＝＝＝＝＝＝＝＝＝＝＝＝
}

{
  const h4s = document.querySelectorAll('.click-text');
  h4s.forEach(h4 => {
      h4.addEventListener('click', () => {
      h4.parentNode.classList.toggle('appear');
  });
});
}