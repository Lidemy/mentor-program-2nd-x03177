document.addEventListener('DOMContentLoaded', function(){
    document.querySelector('#submit').addEventListener('click', function(event){
        let shortAnswer = document.querySelectorAll('.question');
        let optionsAnswer = document.querySelectorAll('.options');
        const getStyle ={
            // Default
            bgDefault: '#ffffff',
            borderlineDefault: '1px solid #999',
            warningHide: 'none',
            // warning
            bgcRed: '#ffebee',
            borderlineRed: '1px solid #db4437',
            warningShow: 'block',
        };
        
        event.preventDefault();
        if((document.querySelectorAll('.question input[type="text"]')[0].value != '')&&
        (document.querySelectorAll('.options .choose input[type="radio"]:checked') != '') ){
            window.alert('送出表單囉');
            self.location.reload();
            window.scrollTo(0, 0);
        }else{
            // 填選題
            for(var i =0; i<shortAnswer.length; i++){
                if(shortAnswer[i].querySelectorAll('input[type="text"]')[0].value == ''){
                    //console.log(shortAnswer[i].querySelectorAll('input[type="text"]'));
                    event.preventDefault();
                    shortAnswer[i].style.backgroundColor = getStyle.bgcRed ;
                    shortAnswer[i].querySelector('input[type="text"]').style.borderBottom= getStyle.borderlineRed ;
                    shortAnswer[i].querySelector('input[type="text"]').style.backgroundColor = getStyle.bgcRed ;
                    // console.log(shortAnswer.parentNode.childNodes);
                    shortAnswer[i].querySelector('.warning').style.display = getStyle.warningShow ;
                }else{
                    shortAnswer[i].style.backgroundColor = getStyle.bgDefault ;
                    shortAnswer[i].querySelector('input[type="text"]').style.borderBottom= getStyle.borderlineDefault ;
                    shortAnswer[i].querySelector('input[type="text"]').style.backgroundColor = getStyle.bgDefault ;
                    shortAnswer[i].querySelector('.warning').style.display = getStyle.warningHide ;
                }
            }

            // 單選題
            for(var i=0; i<optionsAnswer.length; i++){
                //console.log(optionsAnswer[i].querySelector('.choose input').nodeValue)
                if(!optionsAnswer[i].querySelector('.choose input[type="radio"]:checked')){
                    optionsAnswer[i].style.backgroundColor = getStyle.bgcRed ;
                    optionsAnswer[i].querySelector('.warning').style.display = getStyle.warningShow ;
                }else{
                    optionsAnswer[i].style.backgroundColor = getStyle.bgDefault ;
                    optionsAnswer[i].querySelector('.warning').style.display = getStyle.warningHide ;
                }
            }
        }
        
    })
})