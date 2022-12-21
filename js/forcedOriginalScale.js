export const forcedOriginalScale = ( containerId ) => {

        var App = document.getElementById( containerId ); //получаем div по его id
        if ( App.clientWidth > 900) {
                App.style.zoom = (1 / devicePixelRatio)
        }
       ; //устанавливаем масштаб в зависимости от pixel-ratio

}
