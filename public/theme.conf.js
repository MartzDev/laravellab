// Funciones de utilidad para manejo de cookies
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie =
        name +
        "=" +
        encodeURIComponent(value) +
        "; expires=" +
        expires +
        "; path=/";
}

function getCookie(name) {
    return document.cookie.split("; ").reduce((r, v) => {
        const parts = v.split("=");
        return parts[0] === name ? decodeURIComponent(parts[1]) : r;
    }, "");
}

// Función para aplicar el tema
function applyTheme(theme) {
    if (theme === "dark") {
        document.documentElement.classList.remove("light");
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
        document.documentElement.classList.add("light");
    }
}

// Función para alternar el tema
function toggleTheme() {
    // Simplemente alternar entre 'light' y 'dark'
    const currentTheme = getCookie("theme") || "light";
    const newTheme = currentTheme === "light" ? "dark" : "light";

    setCookie("theme", newTheme, 365); // Guardar por 1 año
    applyTheme(newTheme);

    return newTheme;
}

// Inicializar el tema
function initializeTheme() {
    const savedTheme = getCookie("theme") || "light"; // Valor por defecto: light
    applyTheme(savedTheme);
}

// Inicializar cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", initializeTheme);
