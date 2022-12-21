export const forcedOriginalScale = ( containerId ) => {

        var App = document.getElementById( containerId ); //получаем div по его id
        App.style.zoom = (1 / devicePixelRatio) * 1.5; //устанавливаем масштаб в зависимости от pixel-ratio

}
