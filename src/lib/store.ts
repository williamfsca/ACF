import { create } from 'zustand';
import { FieldGroup } from './types';

interface CustomFieldsStore {
  fieldGroups: FieldGroup[];
  addFieldGroup: (group: FieldGroup) => void;
  removeFieldGroup: (title: string) => void;
  updateFieldGroup: (title: string, group: FieldGroup) => void;
}

export const useCustomFieldsStore = create<CustomFieldsStore>((set) => ({
  fieldGroups: [],
  addFieldGroup: (group) =>
    set((state) => ({
      fieldGroups: [...state.fieldGroups, group],
    })),
  removeFieldGroup: (title) =>
    set((state) => ({
      fieldGroups: state.fieldGroups.filter((group) => group.title !== title),
    })),
  updateFieldGroup: (title, updatedGroup) =>
    set((state) => ({
      fieldGroups: state.fieldGroups.map((group) =>
        group.title === title ? updatedGroup : group
      ),
    })),
}));