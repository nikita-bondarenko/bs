export const forcedOriginalScale = ( containerId ) => {

        var App = document.getElementById( containerId ); //получаем div по его id
        if ( App.clientWidth > 900 && App.clientWidth < 1441) {
                App.style.zoom = (1 / devicePixelRatio) * 1.3
        }
       ; //устанавливаем масштаб в зависимости от pixel-ratio

}
