// Crear un Map vacío
const personas = new Map();

// Añadir tres personas con sus edades
personas.set("Juan", 25);
personas.set("Ana", 30);
personas.set("Carlos", 28);

// Modificar la edad de una persona
personas.set("Ana", 31); // Cambiamos la edad de Ana a 31

// Eliminar a una persona del Map
personas.delete("Carlos"); // Eliminamos a Carlos del Map

// Mostrar todas las personas y sus edades
console.log("Personas y sus edades:");
personas.forEach((edad, nombre) => {
  console.log(`${nombre}: ${edad}`);
});

// Verificar si hay una persona específica en el Map
const personaABuscar = "Juan";
console.log(`¿Está ${personaABuscar} en el Map?`, personas.has(personaABuscar));

// Buscar un valor y, si existe, eliminar el par clave-valor
const edadABuscar = 31;
for (const [nombre, edad] of personas) {
  if (edad === edadABuscar) {
    personas.delete(nombre);
    console.log(`Eliminado ${nombre} con la edad ${edadABuscar}`);
    break; // Salimos del bucle después de eliminar la primera coincidencia
  }
}

// Limpiar el Map
personas.clear();
console.log("Map después de limpiarlo:", personas);
