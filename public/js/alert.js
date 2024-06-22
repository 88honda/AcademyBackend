        // document.addEventListener('DOMContentLoaded', () => {
        //     const deleteButtons = document.querySelectorAll('.delete-button');
            
        //     deleteButtons.forEach(button => {
        //         button.addEventListener('click', (event) => {
        //             event.preventDefault(); // フォームのデフォルト送信を防ぐ
        //             const confirmation = confirm('本当に削除しますか？');
                    
        //             if (confirmation) {
        //                 this.closest('.tb-btn-del').submit(); // ユーザーが確認した場合、フォームを送信
        //             }
        //         });
        //     });
        // });

        $(function(){
            $(".tb-btn-del").click(function(){
            if(confirm("本当に削除しますか？")){
            //そのままsubmit（削除）
            }else{
            //cancel
            return false;
            }
            });
            });
        // function CheckDelete(){
        //     if(confirm('削除しますか？')){ 
        //         return true; 
        //     }else{
        //         alert('キャンセルされました'); 
        //         return false; 
        //     }
        // }