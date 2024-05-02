import { axiosClient } from "../../api/axios";
const Societeapi = {
    create: async (payload) => {
        return await axiosClient.post("/societes", payload);
    },
    update: async (id, payload) => {
        return await axiosClient.put(/societes/${id}, {
            ...payload,
            id,
        });
    },
    delete: async (id) => {
        return await axiosClient.delete(/societes/${id});
    },
    all: async (columns = []) => {
        return await axiosClient.get("/societes", {
            params: {
                columns: columns,
            },
        });
    },
};
export default Societeapi;