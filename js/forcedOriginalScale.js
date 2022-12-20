export const forcedOriginalScale = ( containerId ) => {

    const App = document.getElementById( containerId ); //получаем div по его id
    console.log(App)
    App.style.zoom = (1 / devicePixelRatio); //устанавливаем масштаб в зависимости от pixel-ratio

}
