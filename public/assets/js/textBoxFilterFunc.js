function searchOn(words, find, limit) {
    if(words == undefined || !Array.isArray(words)) {
        return [];
    }

    if(find == undefined || String(find).length <= 0) {
        return [];
    }

    if(limit == undefined || isNaN(limit)) {
        limit = null;
    }

    let matches = [];
    words.forEach((word) => {
        if(limit == 0) {
            return matches;
        }

        if(word.toLowerCase() != find.toLowerCase()) {
            
            if(word.toLowerCase().substr(0, find.length) == find.toLowerCase()) {
                matches.push(word);
                
                if(limit !== null) {
                    limit--;
                }
            }
        }
    });

    return matches;
}

function filter(id){
let textboxes = document.querySelectorAll('tbody  tr .completeIt');
textboxes.forEach((textbox) => {
    let input = textbox.querySelector('input[type="text"]');
    let autoComplete = textbox.querySelector('#auto'+id);

    input.addEventListener('input', () => {
        let val = input.value;

        let matches = searchOn(countries, val, 3);
        
        let items = autoComplete.querySelectorAll('.item');
        
        let remains = [];
        items.forEach((item) => {
            let save = false;
            matches.forEach((match) => {
                if(item.dataset.value == match) {
                    save = true;
                    remains.push(match);
                }
            });

            if(!save) {
                item.remove();
            }
        });

        matches.forEach((match, index) => {
            if(!remains.includes(match)) {
                let item = document.createElement('a');
                item.classList.add('item');
                item.setAttribute('href', '#');

                item.innerHTML = match;
                item.dataset.value = match;

                item.addEventListener('click', (event) => {
                    event.preventDefault();

                    input.value = match;

                    autoComplete.querySelectorAll('.item').forEach((item) => {
                        item.remove();
                    });

                    input.focus();
                });

                setTimeout(() => {
                    autoComplete.appendChild(item);
                }, index * 50);
            }
        });
    });

    input.addEventListener('keyup', (event) => {
        if(event.keyCode == 40) {
            let firstItem = autoComplete.querySelector('.item');
            if(firstItem != undefined) {
                firstItem.focus();
            }
        }
    });

});
}