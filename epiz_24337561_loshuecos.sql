CREATE DATABASE lh

  DEFAULT CHARACTER SET utf8;



USE lh;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `autor_id` varchar(255) NOT NULL,
  `entrada_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `video` text DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen2` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `texto` text NOT NULL,
  `fecha` datetime NOT NULL,
  `activa` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_video` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen2` varchar(255) DEFAULT NULL,
  `imagen3` varchar(255) DEFAULT NULL,
  `imagen4` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `precio` text DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `activa` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacion_clave`
--

CREATE TABLE `recuperacion_clave` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `url_secreta` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--
