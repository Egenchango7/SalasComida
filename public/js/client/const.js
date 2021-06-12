const myMap = new Maps(),
    windowW = window.innerWidth,
    windowH = window.innerHeight,
    isMediumWindow = windowW > 1280 && windowH > 720,
    urlIcon = isMediumWindow 
        ? 'src/markerDefault.png'
        : 'src/markerDefault(60x75).png',
        // ? 'https://i.postimg.cc/65GCkjzh/marker-Rest-White.png' 
        // : 'https://i.postimg.cc/7Lwv11Rd/marker-Default-60x75.png',
    biggerIcon = isMediumWindow 
        ? 'src/markerDefault(100x125).png'
        : 'src/markerDefault.png',
        // ? 'https://i.postimg.cc/QMn0XyrT/marker-Defaul-100x125.png'
        // 'https://i.postimg.cc/Dfc8LDBk/marker-Selected.png'; 
        // : 'https://i.postimg.cc/65GCkjzh/marker-Rest-White.png',
    newMarkerIcon = isMediumWindow
        ? 'src/markerNew.png'
        : 'src/markerNew(60x75).png'
    colors = {
        red: '#ea4335',
        green: '#7cb342'
    },
    iconPermisos = {
        '0': { color: colors.red, text: 'dangerous' },
        '1': { color: colors.green, text: 'verified' }
    };