const caseStudyFilters = {
    init: () => {
        const buttons = document.querySelectorAll('.case-study-filters__button');

        buttons.forEach(button => {
            button.addEventListener('click', event => {
                const type = button.dataset.type;
                caseStudyFilters.setActiveButton( buttons, button );
                caseStudyFilters.setActiveCase( type );
            });
        });

        // Show all cases on init
        buttons[0].click();
    },
    setActiveButton: ( buttons, button ) => {
        // Clear active class
        buttons.forEach(button => {
            button.classList.remove('case-study-filters__button--active');
        });

        // Set current active class
        button.classList.add('case-study-filters__button--active');
    },
    setActiveCase: ( _type ) => {
        const cases = document.querySelectorAll('.case-study');
        const types = document.querySelectorAll('.case-study__types span');

        // Clear active class
        cases.forEach(caseStudy => {
            caseStudy.classList.remove('case-study--active');
        });

        // Set current active class
        if (_type === 'all'){
            cases.forEach(caseStudy => {
                caseStudy.classList.add('case-study--active');
            });
        } else {
            types.forEach(type => {
                if (type.innerHTML === _type){
                    const caseStudy = type.closest('.case-study');
                    caseStudy.classList.add('case-study--active');
                }
            });
        }

        // Set positions of Case Studies
        caseStudyFilters.setMasonry();
    },
    setMasonry: ( ) => {
        const active = document.querySelectorAll('.case-study--active');
        const columns = document.querySelector('.row');
        let height = 0;
        let heights = [];

        for (let j=0; j<active.length; j++){
            height = height + active[j].clientHeight;
            if (j % ( active.length/2 ) === 0 ){
                heights.push(height);
                height = 0;
            } else {
                if ( j === ( active.length - 1 ) ){
                    height = active[j].clientHeight;
                    heights.push(height);
                }
            }
        }

        height = 0;

        for (let h=0; h<heights.length; h++){
            let old = heights[h];

            if ( heights[h + 1] ){
                if (old > heights[h + 1]){
                    height = heights[h];
                } else {
                    height = heights[h + 1];
                }
            }
            if ( active.length % 2 !== 0 ){
                height = height + heights[heights.length - 1];
            }
        }

        columns.style.height = height + 'px';
    }
};

window.addEventListener('load', () => {
    caseStudyFilters.init();
});