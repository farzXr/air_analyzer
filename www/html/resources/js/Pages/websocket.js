let socket = null;

export function useWebSocket() {
    if (!socket) {
        socket = new WebSocket("ws://localhost:8081/ws");

        socket.onopen = () => {
            console.log("✅ WebSocket подключён");
        };

        socket.onerror = (error) => {
            console.error("❌ Ошибка WebSocket:", error);
        };

        socket.onclose = () => {
            console.log("❌ WebSocket отключён");
            socket = null; // Обнуляем переменную, чтобы пересоздать при новом входе
        };
    }

    return socket;
}

export function closeWebSocket() {
    if (socket) {
        socket.close();
        socket = null;
    }
}
